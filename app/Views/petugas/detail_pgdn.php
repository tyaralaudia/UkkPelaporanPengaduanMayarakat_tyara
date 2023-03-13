<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <div class="card mb-3">
                <?php if ($pgdn['foto'] != "") { ?>
                    <img src="<?= base_url("img/{$pgdn['foto']}"); ?>" class="card-img-top" alt="">
                <?php } else { ?>
                    <img src="<?= base_url("img/no-image.png"); ?>" class="card-img-top" alt="">
                <?php } ?>
                <div class="card-body">
                    <h5 class="card-title">Dari: <span class="badge badge-warning"><?= $pgdn['nama']; ?></span> | <span class="badge badge-secondary"><?= $pgdn['nik']; ?></span></h5>
                    <p class="card-text">Isi Laporan : <?= $pgdn['isi_laporan']; ?></p>
                    <p class="card-text">Tgl Pengaduan : <?= $pgdn['tgl_pengaduan']; ?></p>
                    <p class="card-text">Status : <?php if ($pgdn['status'] == '0') { ?>
                            <span class="badge badge-warning">Belum Diproses</span>
                        <?php } elseif ($pgdn['status'] == 'proses') { ?>
                            <span class="badge badge-info">Diproses</span>
                        <?php } else { ?>
                            <span class="badge badge-success">Selesai</span>
                        <?php } ?>
                    </p>
                </div>
            </div>
        </div>

        <?php if (isset($tgpn)) : ?>
            <div class="col-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Pengirim Tanggapan: <span class="badge badge-warning"><?= $tgpn['nama_petugas']; ?></span></h5>
                        <p class="card-text">Isi Tanggapan : <?= $tgpn['tanggapan']; ?></p>
                        <p class="card-text">Tgl Tanggapan : <?= $tgpn['tgl_tanggapan']; ?></p>
                        <p class="card-text">Tgl Diupdate : <?= $tgpn['updated_at']; ?></p>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>

<?= $this->endSection(); ?>