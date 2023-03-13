<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PetugasController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login Petugas',
            'validation' => \Config\Services::validation()
        ];
        return view('petugas/v_login', $data);
    }

    public function login()
    {
        if (!$this->validate([
            'txtUsername' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username belum diisi.'
                ]
            ],
            'txtPassword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password belum diisi.'
                ]
            ]
        ])) {
            $validasi = \Config\Services::validation();
            return redirect()->to('/petugas')->withInput()->with('validation', $validasi);
        } else {
            // $DataPetugas = new Petugas();
            $syarat = [
                'username' => $this->request->getPost('txtUsername'),
                'password' => md5($this->request->getPost('txtPassword'))
            ];
            $Userpetugas = $this->petugasmodel->where($syarat)->find();
            if (count($Userpetugas) == 1) {
                $session_data = [
                    'username' => $Userpetugas[0]['username'],
                    'id_petugas' => $Userpetugas[0]['id_petugas'],
                    'nama_petugas' => $Userpetugas[0]['nama_petugas'],
                    'level' => $Userpetugas[0]['level'],
                    'sudahkahLogin' => TRUE
                ];
                session()->set($session_data);
                return redirect()->to('/petugas/dashboard');
            } else {
                session()->setFlashdata('pesan', 'Login gagal! Username atau Password salah');
                return redirect()->to('/petugas');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/petugas');
    }

    public function view_pengaduan()
    {
        $data = [
            'title' => 'Data Pengaduan',
            'pengaduan' => $this->pengaduanmodel
                ->join('masyarakat', 'masyarakat.nik = pengaduan.nik')
                // ->join('tanggapan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan', 'left')
                ->orderBy('tgl_pengaduan', 'desc')
                ->orderBy('pengaduan.id_pengaduan', 'desc')
                ->findAll()
        ];

        return view('petugas/v_pengaduan', $data);
    }

    public function pgdn_belum_diproses()
    {
        // $tgpn = $this->tanggapanmodel->select('id_pengaduan')
        //     ->findAll();
        // $id_tanggapan = \array_column($tgpn, 'id_pengaduan');

        // $pgdn = $this->pengaduanmodel
        //     ->join("masyarakat", "masyarakat.nik = pengaduan.nik")
        //     ->whereIn('status', ['0', 'proses'])
        //     ->orderBy('tgl_pengaduan', 'desc')
        //     ->findAll();

        // $id_pgdn = $this->pengaduanmodel->select('id_pengaduan')
        //     ->findAll();
        // $id_pengaduan = \array_column($id_pgdn, 'id_pengaduan');
        // \dd($id_pengaduan);
        $pgdn = $this->pengaduanmodel
            // ->join("tanggapan", "tanggapan.id_pengaduan = tanggapan.id_pengaduan")
            ->join("masyarakat", "masyarakat.nik = pengaduan.nik")
            ->where('pengaduan.status', '0')
            ->orderBy('tgl_pengaduan', 'desc')
            ->findAll();

        // \dd($tanggapan);
        $data = [
            'title' => 'Data Pengaduan Belum Ditanggapi',
            'pgdn' => $pgdn
        ];

        return view('petugas/pgdn_blm_diproses', $data);
    }

    public function pgdn_proses_selesai()
    {
        $pgdn = $this->pengaduanmodel
            // ->join("tanggapan", "tanggapan.id_pengaduan = tanggapan.id_pengaduan")
            ->join("masyarakat", "masyarakat.nik = pengaduan.nik")
            ->whereIn('pengaduan.status', ['selesai', 'proses'])
            ->orderBy('tgl_pengaduan', 'desc')
            ->findAll();

        // \dd($tanggapan);
        $data = [
            'title' => 'Data Pengaduan Status Proses/Selesai',
            'pgdn' => $pgdn
        ];

        return view('petugas/pgdn_proses', $data);
    }

    public function view_tanggapan()
    {
        $DataTgpn = $this->tanggapanmodel->getTanggapan();
        $data = [
            'title' => 'Data Tanggapan',
            'tgpn' => $DataTgpn
        ];

        return view('petugas/v_tanggapan', $data);
    }

    public function detail_pengaduan($id_pengaduan)
    {

        $data = [
            'title' => "Detail Pengaduan",
            'pgdn' => $this->pengaduanmodel
                // ->select('pengaduan.*, tanggapan.tgl_tanggapan, tanggapan.tanggapan, petugas.nama_petugas')
                ->where('pengaduan.id_pengaduan', $id_pengaduan)
                ->join('masyarakat', 'masyarakat.nik = pengaduan.nik')
                // ->join('tanggapan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan')
                // ->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas')
                ->get()->getRowArray(),
            'tgpn' => $this->tanggapanmodel
                ->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan')
                ->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas')
                ->where('pengaduan.id_pengaduan', $id_pengaduan)
                ->first()
        ];
        // \dd($data);

        return view('petugas/detail_pgdn', $data);
    }

    public function update_status_proses($id_pengaduan)
    {
        $where = ['id_pengaduan' => $id_pengaduan];
        $data = ['status' => 'proses'];

        $this->pengaduanmodel->update($where, $data);

        session()->setFlashdata('status_proses', 'Status berhasil diupdate menjadi Proses');
        return redirect()->back();
    }

    public function form_tanggapan($id_pgdn)
    {
        $data = [
            'title' => 'Form Tanggapan',
            'pgdn' => $this->pengaduanmodel
                ->where('pengaduan.id_pengaduan', $id_pgdn)
                ->join('masyarakat', 'masyarakat.nik = pengaduan.nik')
                ->get()->getRowArray(),
            'validation' => \Config\Services::validation()
        ];
        return view('petugas/v_formTanggapan', $data);
    }

    public function save_tanggapan()
    {
        // validasi input
        if (!$this->validate([
            'tanggapan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Tanggapan harus diisi.',
                ]
            ],
        ])) {
            session()->setFlashdata('list_errors', $this->validasi->listErrors('template_validasi'));
            return redirect()->back()->withInput('validation', $this->validasi);
        }

        $id_pengaduan = $this->request->getPost('id_pengaduan');
        $id_petugas = $this->request->getPost('id_petugas');
        // $tgl_tanggapan = $this->request->getPost('tgl_tanggapan');
        $tanggapan = $this->request->getPost('tanggapan');
        $input = [
            'id_pengaduan' => $id_pengaduan,
            'id_petugas' => $id_petugas,
            // 'tgl_tanggapan' => $tgl_tanggapan,
            'tanggapan' => $tanggapan,
        ];

        $status = ['status' => 'selesai']; // update status pengaduan menjadi selesai
        $this->pengaduanmodel->update(['id_pengaduan' => $id_pengaduan], $status);
        $this->tanggapanmodel->insert($input);
        session()->setFlashdata('success_tambah', 'Tanggapan berhasil dikirim.');
        return redirect()->to('/petugas/pengaduan');
    }

    public function edit_tanggapan($id_tgpn)
    {
        $where = ['id_tanggapan' => $id_tgpn];
        $data = [
            'title' => 'Edit Tanggapan',
            // 'tgpn' => $this->tanggapanmodel
            //     ->where($where)
            //     ->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan')
            //     ->join('masyarakat', 'masyarakat.nik = pengaduan.nik')
            //     ->get()->getRowArray(),
            'tgpn' => $this->tanggapanmodel
                ->where($where)
                ->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan')
                ->join('masyarakat', 'masyarakat.nik = pengaduan.nik')
                ->get()->getRowArray(),
            'validation' => \Config\Services::validation()
        ];
        return view('petugas/edit-tanggapan', $data);
    }

    public function update_tanggapan()
    {
        // validasi input
        if (!$this->validate([
            'tanggapan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Tanggapan harus diisi.',
                ]
            ],
        ])) {
            session()->setFlashdata('list_errors', $this->validasi->listErrors('template_validasi'));
            return redirect()->back()->withInput('validation', $this->validasi);
        }

        $id_tanggapan = $this->request->getPost('id_tanggapan');
        $id_petugas = $this->request->getPost('id_petugas');
        $tanggapan = $this->request->getPost('tanggapan');
        $input = [
            'id_tanggapan' => $id_tanggapan,
            'id_petugas' => $id_petugas,
            'tanggapan' => $tanggapan,
        ];

        // $status = ['status' => 'selesai']; // update status pengaduan menjadi selesai
        // $this->pengaduanmodel->update(['id_tanggapan' => $id_tanggapan], $status);
        $this->tanggapanmodel->update(["id_tanggapan" => $id_tanggapan], $input);
        session()->setFlashdata('success_edit', 'Tanggapan berhasil diupdate.');
        return redirect()->to('/petugas/tanggapan');
    }

    public function view_petugas()
    {
        $petugas = $this->petugasmodel->findAll();
        $data = [
            'title' => 'Data Petugas',
            'ptgs' => $petugas
        ];
        return view('petugas/v_petugas', $data);
    }

    public function add_petugas()
    {
        // validasi input
        if (!$this->validate([
            'nama_petugas' => [
                'rules' => 'required|max_length[200]',
                'errors' => [
                    'required' => 'Nama petugas harus diisi.',
                    'max_length' => 'Nama petugas terlalu panjang'
                ]
            ],
            'username' => [
                'rules' => 'required|max_length[200]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'max_length' => 'Username terlalu panjang'
                ]
            ],
            'password' => [
                'rules' => 'required|max_length[200]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'max_length' => 'Password terlalu panjang'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level harus diisi.',
                ]
            ]
        ])) {
            $validasi = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation', $validasi);
        }
        $input = [
            'nama_petugas' => $this->request->getPost('nama_petugas'),
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password')),
            'telp' => $this->request->getPost('telp'),
            'level' => $this->request->getPost('level')
        ];

        $this->petugasmodel->insert($input);
        session()->setFlashdata('pesan', 'Data Petugas berhasil ditambahkan.');
        return redirect()->to('/petugas/data-petugas');
    }

    public function edit_petugas($id_petugas)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit();
        }

        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas');
            exit();
        }

        $data = [
            'title' => 'Edit Petugas',
            'validation' => \Config\Services::validation(),
            'p' => $this->petugasmodel->where('id_petugas', $id_petugas)->first(),
        ];
        //dd($data);
        return view('petugas/v_editPetugas', $data);
    }

    public function update_petugas()
    {
        // validasi input
        if (!$this->validate([
            'nama_petugas' => [
                'rules' => 'required|max_length[200]',
                'errors' => [
                    'required' => 'Nama petugas harus diisi.',
                    'max_length' => 'Nama petugas terlalu panjang'
                ]
            ],
            'username' => [
                'rules' => 'required|max_length[200]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'max_length' => 'Username terlalu panjang'
                ]
            ],

        ])) {
            $validasi = \Config\Services::validation();
            return redirect()->back()->with('validasi', $this->validasi)->withInput()->with('validation', $validasi);
        }

        if ($this->request->getPost('password')) {
            $data = [
                'nama_petugas' => $this->request->getPost('nama_petugas'),
                'password' => md5($this->request->getPost('password')),
                'level' => $this->request->getPost('level'),
                'telp' => $this->request->getPost('telp')

            ];
        } else {
            $data = [
                'nama_petugas' => $this->request->getPost('nama_petugas'),
                'level' => $this->request->getPost('level'),
                'telp' => $this->request->getPost('telp'),
                'password' => md5($this->request->getPost('password')),
            ];
        }

        $this->petugasmodel->update($this->request->getPost('id_petugas'), $data);
        session()->setFlashdata('pesan', 'Data petugas berhasil di update.');
        return redirect()->to('/petugas/data-petugas');
    }

    public function hapus_petugas($idPetugas)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $this->petugasmodel->where('id_petugas', $idPetugas)->delete();
        session()->setFlashdata('hapus', 'Data Petugas berhasil dihapus.');
        return redirect()->to('/petugas/data-petugas');
    }

    public function view_masyarakat()
    {
        $dataMasyarakat = $this->masyarakatmodel->findAll();
        $data = [
            'title' => 'Data Masyarakat',
            'mskt' => $dataMasyarakat
        ];
        return view('petugas/v_masyarakat', $data);
    }

    public function hapus_masyarakat($nik)
    {
        $this->masyarakatmodel->where('nik', $nik)->delete();
        session()->setFlashdata('pesan', 'Data Petugas berhasil dihapus.');
        return redirect()->to('/petugas/data-masyarakat');
    }

    public function profil()
    {
        $id_petugas = session()->get('id_petugas');
        $data = [
            'petugas' => $this->petugasmodel->where(['id_petugas' => $id_petugas])->get()->getRowArray(),
            'title' => 'Profil Akun'
        ];
        return view('petugas/v_profil', $data);
    }

    public function proses_edit_password()
    {

        $id_petugas = session()->get('id_petugas');
        // dd($nik);
        $pass_old = md5($this->request->getPost('pass_old'));
        $pass_old2 = $this->request->getPost('pass_old2');
        $pass_new = $this->request->getPost('pass_new');
        $pass_new2 = $this->request->getPost('pass_new2');
        $username = $this->request->getPost('username');

        $input_update = [
            'password' => md5($pass_new2),
            'username' => $username
        ];
        // dd($input_update);

        if ($pass_old == $pass_old2) {
            if ($pass_new == $pass_new2) {
                $kondisi_id_petugas = ['id_petugas' => $id_petugas];
                $this->petugasmodel->where($kondisi_id_petugas)->set($input_update)->update();

                //jika berhasil tampilkan pesan ini
                session()->setFlashdata('berhasil', 'Akun berhasil diupdate');

                //setelah berhasil update alihkan halaman ke ...
                return redirect()->to('/petugas/dashboard');
                //yg ttik sesuaiin sm routes
            } else {
                //jika password baru yang diinputkan tdak sama, maka

                //1. tamplkan pesan gagal
                session()->setFlashdata('warning', 'Password baru yang diinputkan tidak sama');

                //2. tetap alihkan ke halaman  trsebut karna password gagal terupdate
                return redirect()->to(base_url('/petugas/profil'));
            }
        } else {
            //jika password lama yang diinputkan tidak sama, maka

            // 1. tamplan pesan gagal
            session()->setFlashdata('warning', 'Password lama yang diinputkan tidak sama');

            //2. tetap alihkan ke halaman tersebut karena password gagal terupdate
            return redirect()->to(base_url('/petugas/profil'));
        }
    }


    public function verifikasi_validasi()
    {
    }

    public function edit_masyarakat($nik)
    {
        $data = [
            'title' => 'Edit',
            'm' => $this->masyarakatmodel->where('nik', $nik)->get()->getRowArray(),
            'validation' => $this->validasi,
        ];

        return view('petugas/v_editMasyarakat', $data);
    }


    public function update_masyarakat()
    {
        // validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|max_length[200]',
                'errors' => [
                    'required' => 'Nama masyarakat harus diisi.',
                    'max_length' => 'Nama masyarakat terlalu panjang'
                ]
            ],
            'username' => [
                'rules' => 'required|max_length[200]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'max_length' => 'Username terlalu panjang'
                ]
            ],

        ])) {
            $validasi = \Config\Services::validation();
            return redirect()->back()->with('validasi', $this->validasi)->withInput()->with('validation', $validasi);
        }

        $nik = $this->request->getPost('nik');
        $data = [
            'nama' => $this->request->getPost('nama'),
            'telp' => $this->request->getPost('telp'),

        ];
        //dd($data);


        // $this->masyarakatmodel->update(['username'], $data);
        $this->masyarakatmodel->update(["nik" => $nik], $data);
        session()->setFlashdata('pesan', 'Data Masyarakat berhasil di update.');
        return redirect()->to('/petugas/data-masyarakat');
    }
}
