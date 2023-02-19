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

// halaman utama
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
$routes->get('/petugas/profil', 'PetugasController::profil_akun');
$routes->get('/petugas/verifikasi-validasi', 'PetugasController::verifikasi_validasi');


//admin
$routes->get('/admin', 'Admin::index');
$routes->post('/admin/login', 'Admin::login');
$routes->get('/admin/logout', 'Admin::logout');
// masyarakat
$routes->get('/', 'MasyarakatController::index');
$routes->post('/masyarakat/login', 'MasyarakatController::login_masyarakat');
$routes->get('/masyarakat/register', 'MasyarakatController::register');
$routes->post('/masyarakat/registrasi', 'MasyarakatController::save_register');
$routes->get('/masyarakat/logout', 'MasyarakatController::logout');
$routes->get('/masyarakat/dashboard', 'DashboardMasyarakat::index', ['filter' => 'otentifikasi']);
$routes->get('/masyarakat/tanggapan', 'MasyarakatController::view_tanggapanAnda');
$routes->get('/masyarakat/profil', 'MasyarakatController::profil_akun');

// crud petugas
$routes->get('/petugas/data-petugas', 'PetugasController::view_petugas');
$routes->get('/petugas/tambah-petugas', 'DashboardPetugas::add_petugas');
$routes->post('/petugas/save-petugas', 'PetugasController::add_petugas');
$routes->post('/petugas/update-petugas', 'PetugasController::update_petugas');
$routes->get('/petugas/edit-petugas/(:num)', 'PetugasController::edit_petugas/$1');
$routes->get('/petugas/hapus-petugas/(:num)', 'PetugasController::hapus_petugas/$1');

// crud masyarakat
$routes->get('/petugas/data-masyarakat', 'PetugasController::view_masyarakat');
$routes->get('/petugas/hapus-masyarakat/(:segment)', 'PetugasController::hapus_masyarakat/$1');

// crud pengaduan
$routes->get('/petugas/pengaduan', 'PetugasController::view_pengaduan');
$routes->get('/petugas/pengaduan/detail/(:num)', 'PetugasController::detail_pengaduan/$1');
$routes->get('/masyarakat/pengaduan/detail/(:num)', 'MasyarakatController::detail_pengaduan/$1');
$routes->get('/masyarakat/pengaduan', 'MasyarakatController::view_PengaduanAnda');
$routes->get('/masyarakat/tambah-pengaduan', 'MasyarakatController::add_pengaduan');
$routes->post('/masyarakat/save', 'MasyarakatController::save_pengaduan');
$routes->get('/masyarakat/pengaduan/hapus/(:num)', 'MasyarakatController::delete_pengaduan/$1');


// crud tanggapan
$routes->get('/petugas/form-tanggapan', 'DashboardPetugas::add_tanggapan');
$routes->get('/petugas/simpan-tanggapan/(:num)', 'PetugasController::beri_tanggapan/$1');
$routes->get('/petugas/tanggapan', 'PetugasController::view_tanggapan');
$routes->get('/petugas/tanggapan/detail', 'PetugasController::detail_tanggapan');



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
