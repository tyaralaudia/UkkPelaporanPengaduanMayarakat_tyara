<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header mb-2 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Petugas</h6>
                </div>
                <div class="card-body">
                    <form action="/petugas/save-petugas" method="post">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="nama_petugas">Nama Petugas</label>
                                <input type="text" class="form-control <?= ($validation->hasError('nama_petugas')) ? 'is-invalid' : ''; ?>" name="nama_petugas" aria-describedby="emailHelpId" autofocus value="<?= old('nama_petugas'); ?>">
                                <?php if ($validation->hasError('nama_petugas')) : ?>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_petugas'); ?>
                                    </div>
                                <?php endif ?>
                            </div>

                            <div class="form-group col-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" aria-describedby="emailHelpId" value="<?= old('username'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username'); ?>
                                </div>
                            </div>

                            <div class="form-group col-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" aria-describedby="emailHelpId" value="<?= old('password'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="level">Level</label>

                                    <input type="text" readonly class="form-control" name="level" id="level" aria-describedby="emailHelpId" placeholder="" value="<?= ('petugas'); ?>">

                                </div>
                            </div>

                            <div class="form-group col-4">
                                <label for="telp">Telp</label>
                                <input type="text" class="form-control" name="telp" aria-describedby="emailHelpId" placeholder="">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_petugas'); ?>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>

                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>

</div>

<?= $this->endSection(); ?>