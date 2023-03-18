<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/', 'HalamanUtama::index');


// petugas
$routes->get('/petugas', 'PetugasController::index');
$routes->post('/petugas/login', 'PetugasController::login');
$routes->get('/petugas/logout', 'PetugasController::logout');
$routes->get(
    '/petugas/dashboard',
    'DashboardPetugas::dashboard',
    ['filter' => 'otentifikasi']
);
$routes->get('/petugas/profil', 'PetugasController::profil', ['filter' => 'otentifikasi']);
$routes->post('/update_password', 'PetugasController::proses_edit_password', ['as' => 'updatePassword']);

$routes->get('/petugas/verifikasi-validasi', 'PetugasController::verifikasi_validasi', ['filter' => 'otentifikasi']);

// masyarakat
// $routes->get('/Akun', 'User::profile');
$routes->post('/update_pass', 'MasyarakatController::proses_edit_pass', ['as' => 'updatePass']);
$routes->get('/', 'MasyarakatController::index');
$routes->post('/masyarakat/login', 'MasyarakatController::login_masyarakat');
$routes->get('/masyarakat/register', 'MasyarakatController::register');
$routes->post('/masyarakat/registrasi', 'MasyarakatController::save_register');
$routes->get('/masyarakat/logout', 'MasyarakatController::logout');
$routes->get('/masyarakat/dashboard', 'DashboardMasyarakat::index', ['filter' => 'otentifikasi']);
$routes->get('/masyarakat/tanggapan', 'MasyarakatController::view_tanggapanAnda', ['filter' => 'otentifikasi']);
$routes->get('/masyarakat/profil', 'MasyarakatController::profil_akun', ['filter' => 'otentifikasi']);

// crud petugas
$routes->get('/petugas/data-petugas', 'PetugasController::view_petugas', ['filter' => 'otentifikasi']);
$routes->get('/petugas/tambah-petugas', 'DashboardPetugas::add_petugas', ['filter' => 'otentifikasi']);
$routes->post('/petugas/save-petugas', 'PetugasController::add_petugas', ['filter' => 'otentifikasi']);
$routes->post('/petugas/update-petugas', 'PetugasController::update_petugas', ['filter' => 'otentifikasi']);
$routes->get('/petugas/edit-petugas/(:num)', 'PetugasController::edit_petugas/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/hapus-petugas/(:num)', 'PetugasController::hapus_petugas/$1', ['filter' => 'otentifikasi']);


// crud masyarakat
$routes->get('/petugas/data-masyarakat', 'PetugasController::view_masyarakat', ['filter' => 'otentifikasi']);
$routes->get('/petugas/hapus-masyarakat/(:num)', 'PetugasController::hapus_masyarakat/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/edit-masyarakat/(:num)', 'PetugasController::edit_masyarakat/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/update-masyarakat', 'PetugasController::update_masyarakat', ['filter' => 'otentifikasi']);
$routes->get('/petugas/tambah-masyarakat', 'DashboardMasyarakat::add_masyarakat', ['filter' => 'otentifikasi']);
// $routes->post('/petugas/save_masyarakat', 'PetugasController::add_masyarakat', ['filter' => 'otentifikasi']);

// crud pengaduan
$routes->get('/petugas/pengaduan', 'PetugasController::view_pengaduan', ['filter' => 'otentifikasi']);
$routes->get('/petugas/pengaduan/blm-diproses', 'PetugasController::pgdn_belum_diproses', ['filter' => 'otentifikasi']);
$routes->get('/petugas/pengaduan/status-proses-selesai', 'PetugasController::pgdn_proses_selesai', ['filter' => 'otentifikasi']);
$routes->get('/petugas/pengaduan/detail/(:num)', 'PetugasController::detail_pengaduan/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/pengaduan/update/status-proses/(:num)', 'PetugasController::update_status_proses/$1', ['filter' => 'otentifikasi']);
$routes->get('/masyarakat/pengaduan/detail/(:num)', 'MasyarakatController::detail_pengaduan/$1', ['filter' => 'otentifikasi']);
$routes->get('/masyarakat/pengaduan', 'MasyarakatController::view_PengaduanAnda', ['filter' => 'otentifikasi']);
$routes->get('/masyarakat/tambah-pengaduan', 'MasyarakatController::add_pengaduan', ['filter' => 'otentifikasi']);
$routes->post('/masyarakat/save', 'MasyarakatController::save_pengaduan', ['filter' => 'otentifikasi']);
$routes->get('/masyarakat/pengaduan/edit/(:num)', 'MasyarakatController::edit_pengaduan/$1', ['filter' => 'otentifikasi']);
$routes->post('/masyarakat/pengaduan/update', 'MasyarakatController::update_pengaduan', ['filter' => 'otentifikasi']);
$routes->get('/masyarakat/pengaduan/hapus/(:num)', 'MasyarakatController::delete_pengaduan/$1', ['filter' => 'otentifikasi']);
$routes->get('/masyarakat/tanggapan/edit/(:num)', 'MasyarakatController::editt_tanggapan/$1', ['filter' => 'otentifikasi']);

// crud tanggapan
$routes->get('/petugas/form-tanggapan/(:num)', 'PetugasController::form_tanggapan/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/simpan-tanggapan', 'PetugasController::save_tanggapan', ['filter' => 'otentifikasi']);
$routes->get('/petugas/tanggapan', 'PetugasController::view_tanggapan', ['filter' => 'otentifikasi']);
$routes->get('/petugas/tanggapan/detail/(:num)', 'PetugasController::detail_tanggapan/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/tanggapan/edit/(:num)', 'PetugasController::edit_tanggapan/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/update-tanggapan', 'PetugasController::update_tanggapan', ['filter' => 'otentifikasi']);

// laporan
$routes->get('/laporan/pengaduan', 'LaporanController::pengaduan', ['filter' => 'otentifikasi']);
$routes->get('/laporan/pengaduan/pdf', 'LaporanController::pengaduan', ['filter' => 'otentifikasi']);
$routes->get('/laporan/pengaduan/excel', 'LaporanController::pengaduan', ['filter' => 'otentifikasi']);
$routes->get('/laporan/tanggapan', 'LaporanController::tanggapan', ['filter' => 'otentifikasi']);
$routes->get('/laporan/tanggapan/pdf', 'LaporanController::tanggapan', ['filter' => 'otentifikasi']);
$routes->get('/laporan/tanggapan/excel', 'LaporanController::tanggapan', ['filter' => 'otentifikasi']);
$routes->get('/masyarakat/laporan/pengaduan', 'MasyarakatController::laporan', ['filter' => 'otentifikasi']);
$routes->get('/masyarakat/laporan/tanggapan', 'MasyarakatController::laporan_tanggapan', ['filter' => 'otentifikasi']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
