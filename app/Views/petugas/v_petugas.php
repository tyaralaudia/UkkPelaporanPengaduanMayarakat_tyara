<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card-header mb-2">
                <h3 class="m-0 font-weight-bold text-primary">Data Petugas</h3>
            </div> <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible fade show col-8" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('hapus')) : ?>
                <div class="alert alert-danger alert-dismissible fade show col-8" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <?= session()->getFlashdata('hapus'); ?>
                </div>
            <?php endif; ?>
            <a href="/petugas/tambah_petugas" class="btn btn-primary mb-2"><i class="fa fa-plus-circle mr-2" aria-hidden="true"></i>Petugas</a>
            <table class="table table-stripped table-hover table-light">
                <thead>
                    <tr align="center">
                        <th scope="col">#</th>
                        <th scope="col">Nama Petugas</th>
                        <th scope="col">Username</th>
                        <!-- <th scope="col">Password</th> -->
                        <th scope="col">Telp</th>
                        <th scope="col">Level</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($ptgs as $p) : ?>
                        <tr align="center">
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $p['nama_petugas']; ?></td>
                            <td><?= $p['username']; ?></td>
                            <td><?= $p['telp']; ?></td>
                            <td><?= $p['level']; ?></td>
                            <td>
                                <a href="/petugas/pengaduan/detail/<?= $p['id_petugas']; ?>" class="btn btn-success mb-2" title="Detail"><i class="fas fa-check"></i></a>
                                <a href="/petugas/edit-petugas/<?= $p['id_petugas']; ?>" title="Edit" class="btn btn-warning mb-2"><i class="fas fa-pen"></i></a>
                                <a href="#" class="btn btn-danger mb-2" title="Hapus" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-alt" aria-hidden="true"></i></a>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin akan menghapusnya?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                    <a href="/petugas/hapus-petugas/<?= $p['id_petugas']; ?>" class="btn btn-danger">Hapus</a>

                                </div>
                            </div>
                        </div>
                    </div>

                </tbody>
            </table>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>