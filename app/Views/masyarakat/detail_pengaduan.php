<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/img/<?= $p['foto']; ?>" width="180px">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Nama: </h5>
                    <p class="card-text"><?= $p['isi_laporan']; ?></p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>