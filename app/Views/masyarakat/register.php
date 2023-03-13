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
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container mt-5 pt-2 mb-2">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-5">

                <div class="card my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <!-- <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="col-lg-16">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Silahkan Registrasi!</h1>
                                    <?php if (session()->getFlashdata('salahPassword1')) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <?= session()->getFlashdata('salahPassword1'); ?>
                                        </div>
                                    <?php } ?>

                                    <?php if (session()->getFlashdata('gagalNik')) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                            <?= session()->getFlashdata('gagalNik'); ?>
                                        </div>
                                    <?php } ?>


                                </div>
                                <form class="user" action="/masyarakat/registrasi" method="POST">
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <input type="text" name="nama" class="form-control form-control-user <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" autofocus value="<?= old('nama'); ?>" id="exampleFirstName" placeholder="Nama Lengkap">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" name="nik" class="form-control form-control-user <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" id="exampleLastName" placeholder="NIK" value="<?= old('nik'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nik'); ?>
                                                </div>

                                                <?php if (session()->getFlashdata('gagalNik')) { ?>
                                                    <div class="invalid-feedback">
                                                        <?= session()->getFlashdata('gagalNik'); ?>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <div class="col-sm-6">
                                                <input type="text" name="telp" class="form-control form-control-user <?= ($validation->hasError('telp')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail" placeholder="Telepon" value="<?= old('telp'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('telp'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail" placeholder="Username" value="<?= old('username'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('username'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="exampleInputPassword" placeholder="Password" value="<?= old('password'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="password1" class="form-control form-control-user <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?>" id="exampleRepeatPassword" placeholder="Ulangi Password" value="<?= old('password1'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password1'); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary col-12 rounded-pill">Daftar</button>
                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                                <div class="text-center">
                                    <a class="small" href="/">Sudah punya akun?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Bootstrap core JavaScript-->
        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="/js/sb-admin-2.min.js"></script>

</body>

</html>