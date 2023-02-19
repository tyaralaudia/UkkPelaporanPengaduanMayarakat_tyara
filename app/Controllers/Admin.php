<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login Admin',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/login', $data);
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
            return redirect()->to('/admin')->withInput()->with('validation', $validasi);
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
                return redirect()->to('/admin/dashboard');
            } else {
                session()->setFlashdata('pesan', 'Login gagal! Username atau Password salah');
                return redirect()->to('/petugas');
            }
        }
    }
}
