<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
                    <!-- <input type="date" name="date" id=""> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form action="" method="get">
                                <!-- <div class="input-group col-8 mb-3">
                                    <input type="date" name="date" value="<?= $date ? $date : ''; ?>" class="form-control" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </div> -->
                            </form>
                        </div>
                        <div class="col-lg-6 text-right">
                            <a class="btn btn-danger mb-2 <?= $pgdn == null ? 'disabled' : ''; ?>" href="/laporan/pengaduan/pdf<?= $url_query ?>" role="button"><i class="fas fa-file-pdf"></i> PDF</a>
                            <!-- <a class="btn btn-success mb-2 <?= $pgdn == null ? 'disabled' : ''; ?>" href="/laporan/pengaduan/excel?<?= $url_query ?> role=" button"><i class="fas fa-table"></i> Excel</a> -->
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr align="center">
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Tanggal Pengaduan</th>
                                    <th scope="col">Isi Laporan</th>
                                    <th scope="col">Status</th>
                                    <!-- <th scope="col">Aksi</th> -->
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