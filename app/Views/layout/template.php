<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- summernote -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.css" rel="stylesheet">

    <!-- datatables -->
    <link rel="stylesheet" href="/vendor/datatables/dataTables.bootstrap4.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= (session()->get('level') == 'admin' || session()->get('petugas')) ? '/petugas/dashboard' : '/masyarakat/dashboard'; ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-building"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Pengaduan Masyarakat </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php if (session()->get('level') == 'admin' || session()->get('level') == 'petugas') { ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="/petugas/dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
            <?php } else {  ?>
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="/masyarakat/dashboard">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
            <?php } ?>

            <?php if (session()->get('level') == 'admin' || session()->get('level') == 'petugas') { ?>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Pengaduan dan Tanggapan
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fa fa-envelope-open-text" aria-hidden="true"></i>
                        <span>Pengaduan</span>
                    </a>
                    <div id="collapseTwo" class="collapse <?= url_is('/petugas/pengaduan*') ? 'show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu Pengaduan:</h6>
                            <a class="collapse-item <?= url_is('/petugas/pengaduan') ? 'active' : ''; ?>" href="/petugas/pengaduan">Data Pengaduan</a>
                            <a class="collapse-item <?= url_is('/petugas/pengaduan/blm-diproses') ? 'active' : ''; ?>" href="/petugas/pengaduan/blm-diproses">Belum Diproses</a>
                            <a class="collapse-item <?= url_is('/petugas/pengaduan/status-proses-selesai') ? 'active' : ''; ?>" href="/petugas/pengaduan/status-proses-selesai" href="/petugas/pengaduan/status-proses-selesai">Status Selesai/Diproses</a>

                        </div>
                    </div>
                </li>

                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        <span>Tanggapan</span>
                    </a>
                    <div id="collapseUtilities" class="collapse <?= url_is('/petugas/tanggapan*') ? 'show' : ''; ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu Tanggapan:</h6>
                            <a class="collapse-item <?= url_is('/petugas/tanggapan*') ? 'active' : ''; ?>" href="/petugas/tanggapan">Data Tanggapan</a>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <?php if (session()->get('level') != 'admin' && (session()->get('level') != 'petugas')) { ?>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Pengaduan
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="/masyarakat/pengaduan">
                        <i class="fas fa-envelope-open-text"></i>
                        <span>Pengaduan Anda</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/masyarakat/tambah-pengaduan">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        <span>Tambah Pengaduan</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Tanggapan
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="/masyarakat/tanggapan">
                        <i class="fa fa-reply-all" aria-hidden="true"></i>
                        <span>Tanggapan</span></a>
                </li>

                <div class="sidebar-heading">
                    Laporan
                </div>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="laporan">
                        <i class="fa fa-print" aria-hidden="true"></i>
                        <span> Laporan</span>
                    </a>
                    <div class="collapse <?= url_is('/laporan*') ? 'show' : ''; ?>" id="laporan" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu Laporan: </h6>
                            <a href="/masyarakat/laporan/pengaduan" class="collapse-item <?= url_is('/masyarakat/laporan/pengaduan') ? 'active' : ''; ?>">Laporan Pengaduan</a>
                            <a href="/masyarakat/laporan/tanggapan" class="collapse-item <?= url_is('/masyarakat/laporan/tanggapan') ? 'active' : ''; ?>">Laporan Tanggapan</a>
                        </div>
                    </div>
                </li>

            <?php } ?>

            <?php if (session()->get('level') == 'admin') { ?>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Masyarakat dan Petugas
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Masyarakat</span>
                    </a>
                    <div id="collapsePages" class="collapse <?= url_is('/petugas/data-masyarakat') ? 'show' : ''; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu Masyarakat:</h6>
                            <a class="collapse-item <?= url_is('/petugas/data-masyarakat*') ? 'active' : ''; ?>" href="/petugas/data-masyarakat">Data Masyarakat</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCharts" aria-expanded="true" aria-controls="collapseCharts">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        <span>Petugas</span>
                    </a>
                    <div class="collapse <?= url_is('/petugas/data-petugas') || url_is('/petugas/tambah-petugas') ? 'show' : ''; ?>" id="collapseCharts" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu Petugas: </h6>
                            <a href="/petugas/data-petugas" class="collapse-item <?= url_is('/petugas/data-petugas') ? 'active' : ''; ?>">Data Petugas</a>
                            <a href="/petugas/tambah-petugas" class="collapse-item <?= url_is('/petugas/tambah-petugas') ? 'active' : ''; ?>">Tambah Petugas</a>
                        </div>
                    </div>
                </li>

            <?php } ?>


            <?php if (session()->get('level') == 'admin') { ?>
                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Generate Laporan
                </div>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="laporan">
                        <i class="fa fa-print" aria-hidden="true"></i>
                        <span>Generate Laporan</span>
                    </a>
                    <div class="collapse <?= url_is('/laporan*') ? 'show' : ''; ?>" id="laporan" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Menu Laporan: </h6>
                            <a href="/laporan/pengaduan" class="collapse-item <?= url_is('/laporan/pengaduan') ? 'active' : ''; ?>">Laporan Pengaduan</a>
                            <a href="/laporan/tanggapan" class="collapse-item <?= url_is('/laporan/tanggapan') ? 'active' : ''; ?>">Laporan Tanggapan</a>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User primaryrmation -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php if (session()->get('level') != 'admin' && session()->get('level') != 'petugas') { ?>
                                        <?= session()->get('nama'); ?>
                                    <?php } ?>
                                    <?= session()->get('nama_petugas'); ?>
                                </span>
                                <img class="img-profile rounded-circle" src="/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User primaryrmation -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <?php if (session()->get('level') == 'admin' || session()->get('level') == 'petugas') : ?>
                                    <a class="dropdown-item" href="/petugas/profil">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profil
                                    </a>
                                <?php else : ?>
                                    <a class="dropdown-item" href="/masyarakat/profil">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profil
                                    </a>
                                <?php endif ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/petugas/logout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <?= $this->renderSection('content'); ?>

                <!-- Footer -->
                <footer class="sticky-footer bg-light mt-5">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Tyara Laudia 2023</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->


            </div>
            <!-- End of Content Wrapper -->



        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>


        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin akan keluar?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                        <a class="btn btn-primary" <?php if (session()->get('level') != 'admin' && session()->get('level') != 'petugas') { ?> href="/masyarakat/logout" <?php } else { ?> href="/petugas/logout" <?php } ?>>Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- summernote -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.js"></script>

        <!-- sweetalerts2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $('#summernote').summernote({
                // placeholder: 'inwepo.co',
                tabsize: 2,
                height: 100
            });

            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- datatables -->
        <script src="/js/demo/datatables-demo.js"></script>
        <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

</body>

</html>