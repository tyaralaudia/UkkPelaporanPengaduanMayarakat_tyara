<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header mb-2">
                    <h6 class="m-0 font-weight-bold text-primary">Data Tanggapan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hovered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th scope="col">#</th>
                                    <th scope="col">Pesan Tanggapan</th>
                                    <th scope="col">Nama Petugas</th>
                                    <th scope="col">Tanggal Tanggapan</th>
                                    <th scope="col">Isi Laporan</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Status</th>
                                    <!-- <th scope="col">Aksi</th> -->
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1;
                                foreach ($tgpn as $p) : ?>
                                    <tr align="center">
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $p['tanggapan']; ?></td>
                                        <td><?= $p['nama_petugas']; ?></td>
                                        <td><?= date('D, d-m-Y', strtotime($p['tgl_tanggapan'])); ?></td>
                                        <td><?= $p['isi_laporan']; ?></td>
                                        <td><img src="/img/<?= $p['foto']; ?>" alt="" width="100px"></td>
                                        <td><?php if ($p['status'] == '0') { ?>
                                                <span class="badge badge-warning">Belum Diproses</span>
                                            <?php } elseif ($p['status'] == 'proses') { ?>
                                                <span class="badge badge-info">Diproses</span>
                                            <?php } else { ?>
                                                <span class="badge badge-success">Selesai</span>
                                            <?php } ?>
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