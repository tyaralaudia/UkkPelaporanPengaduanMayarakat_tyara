<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?= "Selamat datang " . '<strong>' . session()->get('nama') . '</strong>'; ?></h1>
            </div>
            <a href="/masyarakat/tambah_pengaduan" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                Pengaduan
            </a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>