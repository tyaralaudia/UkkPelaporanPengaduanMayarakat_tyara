<?php
$edit_tanggapan = session()->getFlashdata('success_edit');

?>
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">

            <?php if ($edit_tanggapan) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <?= $edit_tanggapan; ?>
                </div>
            <?php endif ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Tanggapan</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hovered table-striped table-sm text-xs" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th scope=" col">#</th>
                                    <th scope="col">Nama</th>
                                    <!-- <th scope="col">NIK</th> -->
                                    <th scope="col">Isi Laporan</th>
                                    <th scope="col">Tanggal Laporan</th>
                                    <th scope="col">Tanggapan</th>
                                    <th scope="col">Tanggal Tanggapan</th>
                                    <th scope="col">Nama Petugas</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($tgpn as $t) : ?>
                                    <tr>
                                        <td class="text-center" scope="row"><?= $no++; ?></td>
                                        <td class="text-center"><?= $t['nama']; ?> | <?= $t['nik']; ?></td>
                                        <!-- <td class="text-center"><?= $t['nik']; ?></td> -->
                                        <td class="text-center"><?= $t['isi_laporan']; ?></td>
                                        <td class="text-center"><?= $t['tgl_pengaduan']; ?></td>
                                        <td><?= $t['tanggapan']; ?></td>
                                        <td class="text-center"><?= $t['tgl_tanggapan']; ?></td>
                                        <td class="text-center"><?= $t['nama_petugas']; ?></td>
                                        <td class="text-center">
                                            <!-- <a href="/petugas/pengaduan/detail/<?= $t['id_pengaduan']; ?>" class="btn btn-sm btn-success"><i class="fa fa-check" aria-hidden="true" title="Detail"></i></a> -->
                                            <a href="/petugas/tanggapan/edit/<?= $t['id_tanggapan']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pen" aria-hidden="true" title="Edit Tanggapan"></i></a>
                                            <!-- <a href="/petugas/tanggapan/hapus/<?= $t['id_tanggapan']; ?>" class="btn btn-sm btn-danger" title="Hapus"><i class="fa fa-trash-alt" aria-hidden="true"></i></a> -->
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