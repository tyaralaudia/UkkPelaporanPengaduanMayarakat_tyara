<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-sm">
    <div class="row">
        <div class="col">
            <div class="card-header mb-2">
                <h3 class="m-0 font-weight-bold text-primary">Data Masyarakat</h3>
            </div>
            <table class="table table-bordered table-stripped table-hover table-light">
                <thead>
                    <tr align="center">
                        <th scope="col">#</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama Masyarakat</th>
                        <th scope="col">Username</th>
                        <!-- <th scope="col">Password</th> -->
                        <!-- <th scope="col">Pengaduan</th> -->
                        <th scope="col">Telp</th>
                        <!-- <th scope="col">Aksi</th> -->
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
                                <a href="/petugas/detail-masyarakat" title="Detail" class="btn btn-success mb-2"><i class="fas fa-check"></i></a>
                                <!-- <a href="/petugas/tambah_petugas" class="btn btn-warning mb-2"><i class="fas fa-plus mr-2"></i>Edit</a> -->
                                <a href="#" title="Hapus" class="btn btn-danger mb-2" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-alt" aria-hidden="true"></i></a>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin akan menghapus petugas <?= $m['nama']; ?>?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                    <a class="btn btn-primary" href="/petugas/hapus-masyarakat/<?= $m['nik']; ?>">Hapus</a>
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