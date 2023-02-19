<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <div class="card-header mb-2">
                <h3 class="m-0 font-weight-bold text-primary">Form Pengaduan</h6>
            </div>
            <form action="/masyarakat/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="nama_petugas">Nama</label>
                    <input type="text" class="form-control" name="nama" aria-describedby="emailHelpId" value="<?= session()->get('nama'); ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="nama_petugas">NIK</label>
                    <input type="text" class="form-control" name="nik" aria-describedby="emailHelpId" value="<?= session()->get('nik'); ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="nama_petugas">Tanggal Pengaduan</label>
                    <input type="text" class="form-control  <?= ($validation->hasError('tgl_pengaduan')) ? 'is-invalid' : ''; ?>" name="tgl_pengaduan" value="<?= date('Y-m-d'); ?>" aria-describedby="emailHelpId" autocomplete="off" readonly>
                    <div class="invalid-feedback">
                        <?= $validation->getError('tgl_pengaduan'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">Isi Laporan</label>
                    <textarea type="textarea" class="form-control <?= ($validation->hasError('isi_laporan')) ? 'is-invalid' : ''; ?>" name="isi_laporan" aria-describedby="emailHelpId" value="<?= old('isi_laporan'); ?>" autofocus></textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('isi_laporan'); ?>
                    </div>
                </div>

                <div class="custom-file mb-3">
                    <input type="file" name="foto" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto">
                    <div class="invalid-feedback">
                        <?= $validation->getError('foto'); ?>
                    </div>
                    <label class="custom-file-label" for="foto">Pilih foto...</label>
                </div>


                <button type="submit" class="btn btn-success">Kirim</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>