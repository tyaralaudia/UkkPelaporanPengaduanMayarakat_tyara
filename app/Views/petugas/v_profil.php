<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">


    <h3 class="m-0 font-weight-bold text-primary">Pengaturan Akun (<?= session()->get('nama_petugas'); ?>)</h3>


    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('warning'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('warning'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



            <?php endif; ?>


            <div class="row">
                <div class="col-lg-12">
                    <form class="form-horizontal" action="<?= base_url('/update_password') ?>" Method="POST">
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $petugas['username'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" name="pass_old" class="form-control" placeholder="Password Lama" required>
                                    <input type="hidden" name="pass_old2" value="<?php echo $petugas['password'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" name="pass_new" class="form-control" placeholder="Password Baru" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label>Ulangi Password Baru</label>
                                    <input type="password" name="pass_new2" class="form-control" placeholder="Ulangi Password Baru" required>
                                </div>
                            </div>
                        </div>
                        <!-- <button type="submit" name="perbarui" class="btn btn-primary">Kembali</button> -->

                        <button type="submit" name="perbarui" class="btn btn-success">Simpan Perubahan</button>

                    </form>
                </div>
            </div>
        </div>
        <?= $this->endSection(); ?>