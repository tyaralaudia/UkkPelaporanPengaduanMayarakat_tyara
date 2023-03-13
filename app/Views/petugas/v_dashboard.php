<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= "Selamat datang " . '<strong>' . session()->get('nama_petugas') . '</strong>'; ?></h1>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <?php if (!empty(session()->getFlashdata('berhasil'))) : ?>
                <div class="alert alert-success alert-dismissible fade show col-3" role="alert">
                    <?php echo session()->getFlashdata('berhasil'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- <div class="container"> -->
    <!-- DataTales Example -->

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-3">
                                Data Pengaduan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_pgdn; ?></div>
                            <p class="card-text"></p>
                            <hr>
                            <a href="/petugas/pengaduan" class="text-black">Lihat Rincian<i class="fa fa-arrow-right text-end"></i></a>
                        </div>

                        <div class="col-auto mb-4">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-3">
                                Pengaduan Belum Diproses</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_pgdn_blm_diproses; ?></div>
                            <p class="card-text"></p>
                            <hr>
                            <a href="/petugas/pengaduan/blm-diproses" class="text-black">Lihat Rincian<i class="fa fa-arrow-right text-end"></i></a>
                        </div>
                        <div class="col-auto mb-4">
                            <i class="fas fa-exclamation-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-3">
                                Pengaduan Diproses
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jml_pgdn_diproses; ?></div>
                                    <p class="card-text"></p>
                                    <hr>
                                    <a href="/petugas/pengaduan" class="text-black">Lihat Rincian<i class="fa fa-arrow-right text-end"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto mb-4">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-3">
                                Pengaduan Selesai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_pgdn_selesai; ?></div>
                            <p class="card-text"></p>
                            <hr>
                            <a href="/petugas/pengaduan/status-proses-selesai" class="text-black">Lihat Rincian<i class="fa fa-arrow-right text-end"></i></a>
                        </div>
                        <div class="col-auto mb-4">
                            <i class="fas fa-check-double fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                                Data Tanggapan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_tgpn; ?></div>
                            <p class="card-text"></p>
                            <hr>
                            <a href="/petugas/tanggapan" class="text-black">Lihat Rincian<i class="fa fa-arrow-right text-end"></i></a>
                        </div>
                        <div class="col-auto mb-4">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if (session()->get('level') == 'admin') { ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-3">
                                    Data Masyarakat</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_masy; ?></div>
                                <p class="card-text"></p>
                                <hr>
                                <a href="/petugas/data-masyarakat" class="text-black">Lihat Rincian<i class="fa fa-arrow-right text-end"></i></a>
                            </div>

                            <div class="col-auto mb-4">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-3">
                                    Data Petugas</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_ptgs; ?></div>
                                <p class="card-text"></p>
                                <hr>
                                <a href="/petugas/data-petugas" class="text-black">Lihat Rincian<i class="fa fa-arrow-right text-end"></i></a>
                            </div>

                            <div class="col-auto mb-4">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                                    Data Laporan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_lap; ?></div>
                                <p class="card-text"></p>
                                <hr>
                                <a href="/laporan/pengaduan" class="text-black">Lihat Rincian<i class="fa fa-arrow-right text-end"></i></a>
                            </div>
                            <div class="col-auto mb-4">
                                <i class="fa-solid fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>

    <!-- </div> -->
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>