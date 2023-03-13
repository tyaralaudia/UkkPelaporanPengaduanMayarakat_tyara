<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Masyarakat;
use App\Models\Pengaduan;

class MasyarakatController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login Masyarakat',
            'validation' => \Config\Services::validation()
        ];
        return view('masyarakat/login_masyarakat', $data);
    }

    public function login_masyarakat()
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
                'errors' => ['required' => 'Password belum diisi.']
            ]
        ])) {
            $validasi = \Config\Services::validation();
            return redirect()->to('/')->withInput()->with('validation', $validasi);
        } else {
            $syarat = [
                'username' => $this->request->getPost('txtUsername'),
                'password' => md5($this->request->getPost('txtPassword'))
            ];
            $Usermasyarakat = $this->masyarakatmodel->where($syarat)->find();
            if (count($Usermasyarakat) == 1) {
                $session_data = [
                    // 'password' => '',
                    'password' => $Usermasyarakat[0]['password'],
                    'username' => $Usermasyarakat[0]['username'],
                    'nik' => $Usermasyarakat[0]['nik'],
                    'nama' => $Usermasyarakat[0]['nama'],
                    'telp' => $Usermasyarakat[0]['telp'],
                    'sudahkahLogin' => TRUE
                ];
                session()->set($session_data);
                session()->setFlashdata('success', 'Login Sukses!');
                return redirect()->to('/masyarakat/dashboard');
            }
            session()->setFlashdata('pesan', 'Login gagal! Username atau Password salah');

            return redirect()->to('/MasyarakatController');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
            'validation' => \Config\Services::validation()
        ];
        return view('masyarakat/register', $data);
    }

    public function save_register()
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
            'password' => [
                'rules' => 'required|max_length[200]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'max_length' => 'Password terlalu panjang'
                ]
            ],
            'password1' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi Password harus diisi.',
                    'matches' => 'Konfirmasi Password tidak sama'
                ]
            ],
            'nik' => [
                'rules' => 'required|is_unique[masyarakat.nik]|is_numeric',
                'errors' => [
                    'required' => 'NIK harus diisi.',
                    'is_unique' => 'NIK yang Anda masukkan sudah terdaftar',
                    'is_numeric' => 'NIK harus berisi angka'
                ]
            ],
            'telp' => [
                'rules' => 'required|is_numeric',
                'errors' => [
                    'required' => 'Nomor Telepon harus diisi.',
                    'is_numeric' => 'Nomor Telepon harus berisi angka'
                ]
            ]
        ])) {
            $validasi = \Config\Services::validation();
            return redirect()->to('/masyarakat/register')->withInput()->with('validation', $validasi);
        } else {
            $input = [
                $nama = $this->request->getPost('nama'),
                $username = $this->request->getPost('username'),
                $password = md5($this->request->getPost('password')),
                $password1 = md5($this->request->getPost('password1')),
                $nik = $this->request->getPost('nik'),
                $telp = $this->request->getPost('telp')
            ];

            $data = [
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'password1' => $password1,
                'nik' => $nik,
                'telp' => $telp
            ];

            $cekNik = $this->masyarakatmodel->where($data['nik'])->find();

            if (count($cekNik) == 1) {
                $session_data = [

                    'nama' => $cekNik[0]['nama'],
                    'username' => $cekNik[0]['username'],
                    'password' => $cekNik[0]['nik'],
                    'password1' => $cekNik[0]['nama'],
                    'nik' => $cekNik[0]['nik'],
                    'telp' => $cekNik[0]['telp'],

                    // 'sudahkahLogin' => TRUE
                ];
                session()->set($session_data);
                session()->setFlashdata('gagalNik', 'Nik sudah terdaftar!');
                return redirect()->back();
            } else {
                $this->masyarakatmodel->insert($data);
                session()->set($data);
                session()->setFlashdata('pesan', 'Registrasi berhasil!');
                return redirect()->to('/masyarakat/login');
            }
        }
    }

    public function view_PengaduanAnda()
    {
        helper('text');
        $data = [
            'title' => 'Pengaduan Anda',
            'pgdn' => $this->pengaduanmodel->getPengaduan()
        ];

        // echo view('layout/template', $data);
        return view('masyarakat/pengaduan_anda', $data);
    }

    public function add_pengaduan()
    {
        $data = [
            'title' => 'Tambah Pengaduan',
            'pgdn' => $this->pengaduanmodel->getPengaduan(),
            'validation' => \Config\Services::validation()
        ];
        return view('masyarakat/form_pengaduan', $data);
    }


    public function save_pengaduan()
    {
        // validasi input
        if (!$this->validate([
            'isi_laporan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Laporan harus diisi.',
                ]
            ],
        ])) {
            session()->setFlashdata('list_errors', $this->validasi->listErrors('template_validasi'));
            return redirect()->to('/masyarakat/tambah-pengaduan')->withInput('validation', $this->validasi);
            // return redirect()->to('/masyarakat/tambah-pengaduan')->withInput();
        }
        if (!$this->request->getFile('foto')->isValid()) {
            $input = [
                'nik' => $this->request->getPost('nik'),
                'isi_laporan' => $this->request->getPost('isi_laporan'),
                // 'tgl_pengaduan' => $this->request->getPost('tgl_pengaduan'),
                'status' => '0'
            ];
        } else {
            //  ambil gambar
            $fileFoto = $this->request->getFile('foto');
            //  ambil nama file
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file ke folder public/gambar
            $fileFoto->move(WRITEPATH . '../public/img/', $namaFoto);

            $input = [
                'nik' => $this->request->getPost('nik'),
                'isi_laporan' => $this->request->getPost('isi_laporan'),
                // 'tgl_pengaduan' => $this->request->getPost('tgl_pengaduan'),
                'foto' => $namaFoto,
                'status' => '0'
            ];
        }

        $this->pengaduanmodel->insert($input);
        session()->setFlashdata('pesan', 'Laporan Pengaduan berhasil dikirim.');
        return redirect()->to('/masyarakat/pengaduan');
    }

    public function detail_pengaduan($id_pengaduan)
    {
        $data = [
            'title' => 'Detail Pengaduan',
            'p' => $this->pengaduanmodel->where('id_pengaduan', $id_pengaduan)->get()->getRowArray()
        ];

        return view('masyarakat/detail_pengaduan', $data);
    }

    public function edit_pengaduan($id_pengaduan)
    {
        $data = [
            'title' => 'Edit Pengaduan',
            'p' => $this->pengaduanmodel->where('id_pengaduan', $id_pengaduan)->get()->getRowArray(),
            'validation' => $this->validasi,
        ];

        return view('masyarakat/edit-pengaduan', $data);
    }

    public function update_pengaduan()
    {
        // validasi input
        if (!$this->validate([
            'isi_laporan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Isi Laporan harus diisi.',
                ]
            ],
            'tgl_pengaduan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Pengaduan harus diisi.',
                ]
            ],
        ])) {
            session()->setFlashdata('list_errors', $this->validasi->listErrors('template_validasi'));
            return redirect()->back()->withInput('validation', $this->validasi);
            // return redirect()->to('/masyarakat/tambah-pengaduan')->withInput();
        }
        $id_pengaduan = $this->request->getPost('id_pengaduan');
        $isi_laporan = $this->request->getPost('isi_laporan');
        $nama_foto_lama = $this->request->getPost('nama_foto');
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            if ($nama_foto_lama != '' && file_exists('img/' . $nama_foto_lama)) {
                unlink('img/' . $nama_foto_lama);
            }
            $nama_foto = $file->getRandomName();
            $file->move(WRITEPATH . '../public/img', $nama_foto);
        } else {
            $nama_foto = $nama_foto_lama;
        }

        if ($id_pengaduan) {
            $input = [
                'isi_laporan' => $isi_laporan,
                'foto' => $nama_foto,
            ];
            $this->pengaduanmodel->where('id_pengaduan', $id_pengaduan)->set($input)->update();
            session()->setFlashdata('pesan', 'Laporan Pengaduan berhasil diupdate.');
            return redirect()->to('/masyarakat/pengaduan');
        }
    }

    public function delete_pengaduan($id_pengaduan)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        $this->pengaduanmodel->where('id_pengaduan', $id_pengaduan)->delete();
        session()->setFlashdata('pesan', 'Laporan Pengaduan berhasil dihapus');
        return redirect()->to('/masyarakat/pengaduan');
    }

    public function view_tanggapanAnda()
    {
        $nik = session()->get('nik');
        $data = [
            'title' => 'Pesan Tanggapan',
            'tgpn' => $this->tanggapanmodel
                ->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan')
                ->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas')
                ->where('pengaduan.nik', $nik)
                ->get()->getResultArray()
        ];
        // \dd(\session()->get()); 

        return view('masyarakat/tanggapan_anda', $data);
    }

    public function profil_akun()
    {
        $nik = session()->get('nik');
        $data = [
            'masyarakat' => $this->masyarakatmodel->where(['nik' => $nik])->get()->getRowArray(),
            'title' => 'Profil Akun'
        ];
        return view('masyarakat/profil', $data);
    }


    public function proses_edit_pass()
    {

        $nik = session()->get('nik');
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
                $kondisi_nik = ['nik' => $nik];
                $this->masyarakatmodel->where($kondisi_nik)->set($input_update)->update();

                //jika berhasil tampilkan pesan ini
                session()->setFlashdata('success', 'Akun berhasil diupdate');

                //setelah berhasil update alihkan halaman ke ...
                return redirect()->to('/masyarakat/dashboard'); //yg ttik sesuaiin sm routes
            } else {
                //jika password baru yang diinputkan tdak sama, maka

                //1. tamplkan pesan gagal
                session()->setFlashdata('warning', 'Password baru yang diinputkan tidak sama');

                //2. tetap alihkan ke halaman  trsebut karna password gagal terupdate
                return redirect()->to(base_url('/masyarakat/profil'));
            }
        } else {
            //jika password lama yang diinputkan tidak sama, maka

            // 1. tamplan pesan gagal
            session()->setFlashdata('warning', 'Password lama yang diinputkan tidak sama');

            //2. tetap alihkan ke halaman tersebut karena password gagal terupdate
            return redirect()->to(base_url('/masyarakat/profil'));
        }
    }
}
