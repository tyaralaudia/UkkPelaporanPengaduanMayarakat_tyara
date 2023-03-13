<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header mb-2 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
                    <a href="/petugas/tambah-petugas" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle mr-2" aria-hidden="true"></i>Petugas</a>

                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('pesan')) : ?>
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
                    <table class="table table-striped table-hover" id="dataTable">
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
                                        <!-- <a href="/petugas/pengaduan/detail/<?= $p['id_petugas']; ?>" class="btn btn-success mb-2" title="Detail"><i class="fas fa-check"></i></a> -->
                                        <a href="/petugas/edit-petugas/<?= $p['id_petugas']; ?>" title="Edit" class="btn btn-warning mb-2"><i class="fas fa-pen"></i></a>
                                        <a href="/petugas/hapus-petugas/<?= $p['id_petugas']; ?>" class="btn btn-danger mb-2" onclick="return confirm('Apakah Anda yakin akan menghapusnya?')"><i class="fa fa-trash-alt" aria-hidden="true" title="Hapus"></i></a>
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