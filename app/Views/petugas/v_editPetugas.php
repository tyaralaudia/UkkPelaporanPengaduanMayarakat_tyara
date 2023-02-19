<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <div class="card-header mb-2">
                <h3 class="m-0 font-weight-bold text-primary">Edit Petugas</h3>
            </div>
            <form action="/petugas/update_petugas" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="nama_petugas">Nama Petugas</label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama_petugas')) ? 'is-invalid' : ''; ?>" name="nama_petugas" aria-describedby="emailHelpId" value="<?= $ptgs[0]['nama_petugas']; ?>" autofocus>
                    <div class=" invalid-feedback">
                        <?= $validation->getError('nama_petugas'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" aria-describedby="emailHelpId" value="<?= $ptgs[0]['username']; ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" aria-describedby="emailHelpId" value="<?= $ptgs[0]['password']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" class="form-control <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>" name="level" id="idLevel" value="<?= $ptgs[0]['level']; ?>">
                            <option <?php (session()->get('level') == 'admin') ? 'selected' : '' ?> value="admin">Admin</option>
                            <option <?php (session()->get('level') == 'petugas') ? 'selected' : '' ?> value="petugas">Petugas</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('level'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="telp">Telp</label>
                    <input type="text" class="form-control" name="telp" aria-describedby="emailHelpId" value="<?= $ptgs[0]['telp']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('telp'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Kirim</button>
            </form>

        </div>
    </div>

</div>
<?= $this->endSection(); ?>