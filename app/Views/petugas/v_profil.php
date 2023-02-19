<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card-header mb-2">
                <h3 class="m-0 font-weight-bold text-primary">Profil Anda (<?= session()->get('nama_petugas'); ?>)</h3>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>