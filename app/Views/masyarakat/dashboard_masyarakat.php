<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?= "Selamat datang " . '<strong>' . session()->get('nama') . '</strong>'; ?></h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <?php if (!empty(session()->getFlashdata('success'))) : ?>
                        <div class="alert alert-success alert-dismissible fade show col-3" role="alert">
                            <?php echo session()->getFlashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
                        <div class="alert alert-success alert-dismissible fade show col-3" role="alert">
                            <?php echo session()->getFlashdata('pesan'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <a href="/masyarakat/tambah-pengaduan" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                Pengaduan
            </a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>