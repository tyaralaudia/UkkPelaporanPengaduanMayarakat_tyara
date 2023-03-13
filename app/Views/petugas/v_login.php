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
                                    <h1 class="h4 text-gray-900 mb-4">Silahkan Login!</h1>
                                    <?php if (session()->getFlashdata('belumLogin')) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <?= session()->getFlashdata('belumLogin'); ?>
                                        </div>

                                        <script>
                                            $(".alert").alert();
                                        </script>
                                    <?php } ?>


                                    <?php if (session()->getFlashdata('pesan')) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <?= session()->getFlashdata('pesan'); ?>
                                        </div>

                                        <script>
                                            $(".alert").alert();
                                        </script>
                                    <?php } ?>
                                </div>
                                <form class="user" action="/petugas/login" method="post">
                                    <div class="form-group">
                                        <input type="text" name="txtUsername" class="form-control form-control-user <?= ($validation->hasError('txtUsername')) ? 'is-invalid' : ''; ?>" autofocus aria-describedby="emailHelp" value="<?= old('nama'); ?>" placeholder="Masukkan Username">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('txtUsername'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="txtPassword" class="form-control form-control-user <?= ($validation->hasError('txtPassword')) ? 'is-invalid' : ''; ?>" value="<?= old('nama'); ?>" placeholder="Masukkan Password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('txtPassword'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-user btn-block btn-primary">Login</button>

                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div> -->
                                <!-- </div>
                        </div> -->
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