<?php
$status_proses = session()->getFlashdata('status_proses');

?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">

            <?php if ($status_proses) : ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <?= $status_proses; ?>
                </div>
            <?php endif ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th scope="col">No</th>
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
                                foreach ($pgdn as $p) : ?>
                                    <tr align="center">
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $p['nama']; ?></td>
                                        <td><?= $p['nik']; ?></td>
                                        <td><?= date('d/m/Y', strtotime($p['tgl_pengaduan'])); ?></td>
                                        <td><?= $p['isi_laporan']; ?></td>
                                        <td><?php if ($p['status'] == '0') { ?>
                                                <span class="badge badge-warning">Belum Diproses</span>
                                            <?php } elseif ($p['status'] == 'proses') { ?>
                                                <span class="badge badge-info">Diproses</span>
                                            <?php } else { ?>
                                                <span class="badge badge-success">Selesai</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="/petugas/pengaduan/detail/<?= $p['id_pengaduan']; ?>" class="btn btn-sm btn-success mb-2" title="Detail"><i class="fas fa-check"></i></a>
                                            <?php if ($p['status'] == '0') : ?>
                                                <a href="/petugas/pengaduan/update/status-proses/<?= $p['id_pengaduan']; ?>" onclick="return confirm('Aksi ini akan mengubah status menjadi \'Proses\'. Apakah Anda yakin?')" class="btn btn-sm btn-info mb-2" title="Update Status = Proses">Proses</a>
                                            <?php endif ?>
                                            <!-- <a href="petugas/pengaduan/hapus/<?= $p['id_pengaduan']; ?>" class="btn btn-sm btn-danger mb-2 mr-2" title="Hapus"><i class="fa fa-trash-alt" aria-hidden="true"></i></a> -->
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