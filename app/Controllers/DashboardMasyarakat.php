<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardMasyarakat extends BaseController
{
    public function __construct()
    {
        if (!session()->get('sudahkahLogin')) {
            return redirect()->to('/');
            exit();
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('masyarakat/dashboard_masyarakat', $data);
    }
}
