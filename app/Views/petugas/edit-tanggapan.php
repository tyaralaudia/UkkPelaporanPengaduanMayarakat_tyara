<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4 border-bottom-primary">
                <div class="card-header mb-2">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Tanggapan</h6>
                </div>
                <div class="card-body">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="/img/<?= $tgpn['foto']; ?>" class="img-fluid">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <table class="table">
                                        <tr>
                                            <td scope="row">Nama | NIK</td>
                                            <td>:</td>
                                            <td><?= $tgpn['nama']; ?> | <?= $tgpn['nik']; ?></td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Tanggal Pengaduan</td>
                                            <td>:</td>
                                            <td><?= date('D, d-m-Y', strtotime($tgpn['tgl_pengaduan'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Isi Laporan</td>
                                            <td>:</td>
                                            <td><?= $tgpn['isi_laporan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Status</td>
                                            <td>:</td>
                                            <td><?php if ($tgpn['status'] == '0') { ?>
                                                    <span class="badge badge-warning">Belum Diproses</span>
                                                <?php } elseif ($tgpn['status'] == 'proses') { ?>
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
            </div>
            <div class="card shadow mb-4">
                <div class="card-header mb-2">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tanggapan</h6>
                </div>
                <div class="card-body">

                    <?php if (session()->getFlashdata('list_errors')) : ?>
                        <?= session()->getFlashdata('list_errors'); ?>
                    <?php endif ?>
                    <form action="/petugas/update-tanggapan" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="id_tanggapan">Nama Petugas</label>
                                    <input type="hidden" name="id_tanggapan" id="id_tanggapan" value="<?= $tgpn['id_tanggapan']; ?>">
                                    <input type="hidden" name="id_petugas" id="id_petugas" value="<?= session()->get('id_petugas'); ?>">
                                    <input type="hidden" name="id_pengaduan" value="<?= $tgpn['id_pengaduan']; ?>">
                                    <input type="text" readonly class="form-control" name="nama_petugas" id="id_petugas" aria-describedby="emailHelpId" placeholder="" value="<?= session()->get('nama_petugas'); ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="id_tanggapan">Tanggal Tanggapan</label>
                                    <input type="text" class="form-control" name="tgl_tanggapan" id="tgl_tanggapan" aria-describedby="emailHelpId" readonly value="<?= date('d-m-Y'); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_tanggapan">Tanggapan</label>
                            <textarea type="textarea" id="summernote" class="form-control  <?= ($validation->hasError('tanggapan')) ? 'is-invalid' : ''; ?>" name="tanggapan" value="<?= old('tanggapan'); ?>" id="tanggapan" aria-describedby="emailHelpId" placeholder=""><?= $tgpn['tanggapan']; ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validation->getError('tanggapan'); ?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>