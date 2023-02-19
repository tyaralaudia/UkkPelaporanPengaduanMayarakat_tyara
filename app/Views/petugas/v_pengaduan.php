<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card-header mb-2">
                <h3 class="m-0 font-weight-bold text-primary">Data Pengaduan</h3>
            </div>
            <table class="table table-stripped table-hover table-bordered table-light">
                <thead>
                    <tr align="center">
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Tanggal Pengaduan</th>
                        <th scope="col">Isi Laporan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pengaduan as $p) : ?>
                        <tr align="center">
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['nik']; ?></td>
                            <td><?= $p['tgl_pengaduan']; ?></td>
                            <td><?= $p['isi_laporan']; ?></td>
                            <td><?= $p['status']; ?></td>
                            <td>
                                <a href="/petugas/pengaduan/detail/<?= $p['id_pengaduan']; ?>" class="btn btn-success mb-2" title="Detail"><i class="fas fa-check"></i></a>
                                <a href="/petugas/form-tanggapan" class="btn btn-primary mb-2" title="Tambah Tanggapan"><i class="fas fa-plus"></i></a>
                                <a href="petugas/pengaduan/hapus/<?= $p['id_pengaduan']; ?>" class="btn btn-danger mb-2 mr-2" title="Hapus"><i class="fa fa-trash-alt" aria-hidden="true"></i></a>
                            </td>

                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>