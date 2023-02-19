<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengaduan;
use App\Models\Tanggapan;

class DashboardPetugas extends BaseController
{
    public function __construct()
    {
        if (!session()->get('sudahkahLogin')) {
            session()->setFlashdata('belumLogin', 'Anda belum login');
            return redirect()->to('/petugas');
            exit();
        }
    }

    public function index()
    {
        if (!session()->get('sudahkahLogin')) {
            session()->setFlashdata('belumLogin', 'Anda belum login');
            return redirect()->to('/petugas');
            exit();
        }

        $DataPengaduan = new Pengaduan();
        $pengaduan = $DataPengaduan->findAll();
        $data = [
            'title' => 'Data Pengaduan',
            'pgdn' => $pengaduan
        ];
        // return view('petugas/v_pengaduan', $data);
        echo view('petugas/v_dashboard', $data);
    }

    public function dashboard()
    {
        $model = new Pengaduan();
        $data = [
            'pengaduan' => $model->getPengaduan(),
            'title' => 'Dashboard'
        ];

        return view('petugas/v_dashboard', $data);
    }

    public function add_tanggapan()
    {
        $data = [
            'title' => 'Form Tanggapan',
            'validation' => \Config\Services::validation()
        ];

        return view('petugas/v_formTanggapan', $data);
    }

    public function add_petugas()
    {
        $data = [
            'title' => 'Tambah Petugas',
            'validation' => \Config\Services::validation()
        ];

        return view('petugas/v_formPetugas', $data);
    }

    public function edit_petugas($id_petugas)
    {
        $data = [
            'title' => 'Edit Petugas',
            'validation' => \Config\Services::validation()
        ];

        return view('petugas/v_editPetugas', $data);
    }

    public function hitung_pgdn()
    {
        $model = new Pengaduan();
        $data = [
            'pgdn' => $model->count_pengaduan()
        ];
        return view('layout/template', $data);
    }
}
