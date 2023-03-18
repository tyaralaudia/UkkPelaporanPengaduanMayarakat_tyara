<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <div class="card-header mb-2">
                <h3 class="m-0 font-weight-bold text-primary">Edit Petugas</h3>
            </div>
            <form action="/petugas/update-petugas" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="nama_petugas">Nama Petugas</label>
                    <input type="hidden" class="form-control" name="id_petugas" value="<?= $p['id_petugas']; ?>">
                    <input type="text" class="form-control <?= ($validation->hasError('nama_petugas')) ? 'is-invalid' : ''; ?>" name="nama_petugas" aria-describedby="emailHelpId" value="<?= $p['nama_petugas']; ?>" autofocus>
                    <div class=" invalid-feedback">
                        <?= $validation->getError('nama_petugas'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" name="username" aria-describedby="emailHelpId" value="<?= $p['username']; ?>" readonly>
                    <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>



                <div class="form-group">
                    <div class="form-group">
                        <label for="level">Level</label>

                        <input type="text" readonly class="form-control" name="level" id="level" aria-describedby="emailHelpId" placeholder="" value="<?= $p['level']; ?>">

                    </div>
                </div>

                <div class="form-group">
                    <label for="telp">Telp</label>
                    <input type="text" class="form-control" name="telp" aria-describedby="emailHelpId" value="<?= $p['telp']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('telp'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>

        </div>
    </div>

</div>
<?= $this->endSection(); ?>