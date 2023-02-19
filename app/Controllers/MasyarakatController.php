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
                    'username' => $Usermasyarakat[0]['username'],
                    'nik' => $Usermasyarakat[0]['nik'],
                    'nama' => $Usermasyarakat[0]['nama'],
                    'telp' => $Usermasyarakat[0]['telp'],
                    'sudahkahLogin' => TRUE
                ];
                session()->set($session_data);
                return redirect()->to('/masyarakat/dashboard');
            } else {
                session()->setFlashdata('pesan', 'Login gagal! Username atau Password salah');
                return redirect()->to('/masyarakat');
            }
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
                session()->setFlashdata('gagalNik', 'NIK Anda Sudah Terdaftar');
                return view('masyarakat/register');
            } else {
                $this->masyarakatmodel->insert($data);
                return redirect()->to('/masyarakat/dashboard');
            }
        }
    }

    public function view_PengaduanAnda()
    {
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
        session()->set($data);
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
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status harus diisi.',
                ]
            ],
            'tgl_pengaduan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Pengaduan harus diisi.',
                ]
            ],
            'foto' => [
                'rules' => 'ext_in[foto,png,jpg,jpeg]|max_size[foto,2048]|is_image[foto]',
                'errors' => [
                    'ext_in' => 'Foto yang dipilih harus memiliki ekstensi .jpg, .jpeg, atau .png.',
                    'max_size' => 'Ukuran Foto terlalu besar (max. 1Mb)',
                    'is_image' => 'File yang Anda pilih bukan gambar.'
                ]
            ]
        ])) {
            $validasi = \Config\Services::validation();
            // return redirect()->to('/masyarakat/tambah_pengaduan')->withInput()->with('validation', $validasi);
            return redirect()->to('/masyarakat/tambah-pengaduan')->withInput();
        }
        // ambil gambar
        $fileFoto = $this->request->getFile('foto');
        // pindahkan file ke folder img
        $fileFoto->move('img');
        // ambil nama file
        $namaFoto = $fileFoto->getName();

        $input = [
            'nik' => $this->request->getPost('nik'),
            'isi_laporan' => $this->request->getPost('isi_laporan'),
            'tgl_pengaduan' => $this->request->getPost('tgl_pengaduan'),
            'foto' => $namaFoto,
            'status' => $this->request->getPost('status')
        ];
        session()->set($input);

        $this->pengaduanmodel->insert($input);
        session()->setFlashdata('pesan', 'Laporan Pengaduan berhasil dikirim.');
        return redirect()->to('/masyarakat/pengaduan');
    }

    public function detail_pengaduan($id_pengaduan)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/');
            exit();
        }
        $data = [
            'title' => 'Detail Pengaduan',
            'p' => $this->pengaduanmodel->where('id_pengaduan', $id_pengaduan)->findAll()
        ];

        return view('masyarakat/detail_pengaduan', $data);
    }

    public function edit_pengaduan()
    {
    }

    public function update_pengaduan($id_pengaduan)
    {
    }

    public function delete_pengaduan($id_pengaduan)
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/petugas');
            exit;
        }

        $this->pengaduanmodel->where('id_pengaduan', $id_pengaduan)->delete();
        session()->setFlashdata('hapus', 'Laporan Pengaduan berhasil dihapus');
        return redirect()->to('/masyarakat/pengaduan');
    }

    public function view_tanggapanAnda()
    {
        $data = [
            'title' => 'Tanggapan'
        ];

        return view('masyarakat/tanggapan_anda', $data);
    }

    public function profil_akun()
    {
        $data = [
            'title' => 'Profil Akun'
        ];
        return view('masyarakat/profil', $data);
    }
}
