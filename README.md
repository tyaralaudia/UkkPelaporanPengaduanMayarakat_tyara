#  Aplikasi Pelaporan Pengaduan Masyarakat

## Tentang Pengaduan Masyarakat

Pengaduan Masyarakat adalah aplikasi yang dibuat untuk mempermudah masyarakat menyampaikan keluhan, 
pelaporan pelanggaran hukum serta mempermudah perangkat desa memonitoring pelanggaran pelanggaran yang terjadi di sekitar.
Dengan menggunakan aplikasi ini, tentunya akan lebih mengurangi biaya dalam pendataan pengaduan dari masyarakat, dan mengurangi
penggunaan kertas yang dimana pohon adalah GO GREEN bagi kehidupan manusia.

Aplikasi ini memiliki 3 hak akses level login, yang diantaranya:

Level Admin
- Login
- Logout
- Registrasi
- Verifikasi dan Validasi
- Memberikan Tanggapan
- Generate Laporan

Level Petugas
- Login
- Logout
- Verifikasi dan Validasi
- Memberikan Tanggapan

Level Masyarakat
- Login
- Logout
- Registasi
- Menulis Laporan Pengaduan

Namun, untuk di level Masyarakat, ditambahkan lagi fitur laporan supaya bisa mencetak data yang telah diadukan beserta tanggapanya (jika sewaktu waktu laporan tersebut dibutuhkan).

Untuk di level Admin juga menambahkan fitur Data Petugas, -> untuk me-Registrasi anggota petugas baru.


## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use Github issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
