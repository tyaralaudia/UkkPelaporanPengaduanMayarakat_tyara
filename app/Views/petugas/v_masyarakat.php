<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header mb-2 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Masyarakat</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover" id="dataTable">
                            <thead>
                                <tr align="center">
                                    <th scope="col">#</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama Masyarakat</th>
                                    <th scope="col">Username</th>
                                    <!-- <th scope="col">Password</th> -->
                                    <!-- <th scope="col">Pengaduan</th> -->
                                    <th scope="col">Telp</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($mskt as $m) : ?>
                                    <tr align="center">
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $m['nik']; ?></td>
                                        <td><?= $m['nama']; ?></td>
                                        <td><?= $m['username']; ?></td>
                                        <td><?= $m['telp']; ?></td>
                                        <td>
                                            <!-- <a href="/petugas/detail-masyarakat" title="Detail" class="btn btn-success mb-2"><i class="fas fa-check"></i></a> -->
                                            <a href="/petugas/edit-masyarakat/<?= $m['nik']; ?>" title="Edit" class="btn btn-warning mb-2"><i class="fas fa-pen"></i></a>
                                            <a href="/petugas/hapus-masyarakat/<?= $m['nik']; ?>" class="btn btn-danger mb-2" onclick="return confirm('Apakah Anda yakin akan menghapusnya?')"><i class="fa fa-trash-alt" aria-hidden="true" title="Hapus"></i></a>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>