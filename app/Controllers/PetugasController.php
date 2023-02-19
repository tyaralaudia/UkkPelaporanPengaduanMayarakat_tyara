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
            'pengaduan' => $this->pengaduanmodel->getPengaduan()
        ];

        return view('petugas/v_pengaduan', $data);
        // $pengaduan = $DataPengaduan->findAll();
        // $data = [
        //     'title' => 'Data Pengaduan',
        //     'pgdn' => $pengaduan,
        // ];
        // return view('petugas/v_pengaduan', $data);
        // return view('petugas/v_dashboard', $data);
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
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit();
        }

        if (session()->get('level') != 'admin') {
            return redirect()->to('/petugas');
            exit();
        }

        $data = [
            'title' => "Detail Pengaduan",
            'detail' => $this->pengaduanmodel->where('id_pengaduan', $id_pengaduan)->findAll()
        ];

        return view('petugas/detail_pgdn', $data);
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
            return redirect()->to('/petugas/tambah_petugas')->withInput()->with('validation', $validasi);
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
        return redirect()->to('/petugas/data_petugas');
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
            'ptgs' => $this->petugasmodel->where('id_petugas', $id_petugas)->findAll()
        ];
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
            'password' => [
                'rules' => 'required|max_length[200]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'max_length' => 'Password terlalu panjang'
                ]
            ]
        ])) {
            $validasi = \Config\Services::validation();
            return redirect()->to('/petugas/tambah_petugas')->withInput()->with('validation', $validasi);
        }

        if ($this->request->getPost('password')) {
            $data = [
                'nama_petugas' => $this->request->getPost('nama_petugas'),
                'password' => md5($this->request->getPost('password')),
                'level' => $this->request->getPost('level')
            ];
        } else {
            $data = [
                'nama_petugas' => $this->request->getPost('nama_petugas'),
                'level' => $this->request->getPost('level')
            ];
        }

        $this->petugasmodel->update($this->request->getPost('username'), $data);
        return redirect()->to('/petugas/data_petugas');
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
        return redirect()->to('/petugas/data_petugas');
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
        $this->masyarakatmodel->delete($nik);

        return redirect()->to('/petugas/data_masyarakat');
    }

    public function beri_tanggapan($id_pengaduan)
    {
        if (!session()->get('sudahkahLogin')) {
            session()->setFlashdata('belumLogin', 'Anda belum login');
            return redirect()->to('/petugas');
            exit();
        }

        // validasi input
        if (!$this->validate([
            'tanggapan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggapan harus diisi.'
                ]
            ]
        ])) {
            $validasi = \Config\Services::validation();
            return redirect()->to('/petugas/form_tanggapan')->withInput()->with('validation', $validasi);
        }

        $this->tanggapanmodel->where('id_pengaduan', $id_pengaduan)->first();

        $input = [
            'tanggapan' => $this->request->getPost('tanggapan')
        ];

        $this->tanggapanmodel->insert($input);
        session()->setFlashdata('pesan', 'Tanggapan berhasil dikirim.');
        return redirect()->to('/petugas/tanggapan');
    }

    public function profil_akun()
    {
        $data = [
            'title' => 'Profil Akun'
        ];

        return view('petugas/v_profil', $data);
    }

    public function verifikasi_validasi()
    {
    }
}
