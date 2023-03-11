<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <div class="card-header mb-2">
                <h3 class="m-0 font-weight-bold text-primary">Edit Masyarakat</h3>
            </div>
            <form action="/petugas/update-masyarakat" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="nama">Nama Masyarakat</label>
                    <input type="hidden" class="form-control" name="nik" value="<?= $m['nik']; ?>">
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" aria-describedby="emailHelpId" value="<?= $m['nama']; ?>" autofocus>
                    <div class=" invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" aria-describedby="emailHelpId" value="<?= $m['username']; ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>



                <div class="form-group">
                    <label for="telp">Telp</label>
                    <input type="text" class="form-control" name="telp" aria-describedby="emailHelpId" value="<?= $m['telp']; ?>">
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