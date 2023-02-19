<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HalamanUtama extends BaseController
{
    public function index()
    {
        return view('halaman_utama');
    }
}
