<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card-header mb-2">
                <h3 class="m-0 font-weight-bold text-primary">Data Tanggapan</h6>
            </div>
            <table class="table table-stripped table-hover table-bordered table-light">
                <thead>
                    <tr align="center">
                        <th scope=" col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Isi Laporan</th>
                        <th scope="col">Tanggal Laporan</th>
                        <th scope="col">Tanggapan</th>
                        <th scope="col">Tanggal Tanggap</th>
                        <th scope="col">Nama Petugas</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($tgpn as $t) : ?>
                        <tr align="center">
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= $t['nama']; ?></td>
                            <td><?= $t['nik']; ?></td>
                            <td><?= $t['isi_laporan']; ?></td>
                            <td><?= $t['tgl_pengaduan']; ?></td>
                            <td><?= $t['tanggapan']; ?></td>
                            <td><?= $t['tgl_tanggapan']; ?></td>
                            <td><?= $t['nama_petugas']; ?></td>
                            <td>
                                <a href="/petugas/tanggapan/detail" class="btn btn-success"><i class="fa fa-check" aria-hidden="true" title="Detail"></i></a>
                                <a href="/petugas/tanggapan/edit" class="btn btn-warning"><i class="fa fa-pen" aria-hidden="true" title="Edit Tanggapan"></i></a>
                                <a href="/petugas/tangg" class="btn btn-danger mt-1" title="Hapus"><i class="fa fa-trash-alt" aria-hidden="true"></i></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>