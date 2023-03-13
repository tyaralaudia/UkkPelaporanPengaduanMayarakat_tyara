<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header mb-2">
                    <h6 class="m-0 font-weight-bold text-primary">Form Pengaduan</h6>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('list_errors')) : ?>
                        <?= session()->getFlashdata('list_errors'); ?>
                    <?php endif ?>
                    <form action="/masyarakat/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="form-group">
                                <input type="hidden" name="nama" value="<?= session()->get('nama'); ?>">
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="nik" value="<?= session()->get('nik'); ?>">
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="nama_petugas">Tanggal Pengaduan</label>
                                    <input type="text" class="form-control  <?= ($validation->hasError('tgl_pengaduan')) ? 'is-invalid' : ''; ?>" name="tgl_pengaduan" value="<?= date('d-m-Y'); ?>" aria-describedby="emailHelpId" autocomplete="off" readonly>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('tgl_pengaduan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="username">Isi Laporan</label>
                                    <textarea type="text" class="form-control <?= ($validation->hasError('isi_laporan')) ? 'is-invalid' : ''; ?>" name="isi_laporan" id="isi_laporan" value="<?= old('isi_laporan'); ?>" autofocus></textarea>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('isi_laporan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="custom-file mb-3">
                                    <label for="username">Bukti Pengaduan</label>
                                    <input type="file" name="foto" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('foto'); ?>
                                    </div>
                                    <label class="custom-file-label" for="foto">Pilih foto...</label>
                                </div>
                            </div>

                        </div>
                        <!-- <div class="form-group">
                    <label for="">Status</label>
                    <select class="form-control" name="status" id="">
                        <option>0</option>
                        <option>Proses</option>
                        <option>Selesai</option>
                    </select>
                </div> -->
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>