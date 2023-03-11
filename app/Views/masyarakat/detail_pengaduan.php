<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- <div class="card mb-3" style="max-width: 540px;"> -->
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="/img/<?= $p['foto']; ?>" class="img-fluid">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td scope="row">Tanggal Pengaduan</td>
                            <td>:</td>
                            <td><?= date('D, d-m-Y', strtotime($p['tgl_pengaduan'])); ?></td>
                        </tr>
                        <tr>
                            <td scope="row">Isi Laporan</td>
                            <td>:</td>
                            <td><?= $p['isi_laporan']; ?></td>
                        </tr>
                        <tr>
                            <td scope="row">Status</td>
                            <td>:</td>
                            <td><?php if ($p['status'] == '0') { ?>
                                    <span class="badge badge-warning">Belum Diproses</span>
                                <?php } elseif ($p['status'] == 'proses') { ?>
                                    <span class="badge badge-info">Diproses</span>
                                <?php } else { ?>
                                    <span class="badge badge-success">Selesai</span>
                                <?php } ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>