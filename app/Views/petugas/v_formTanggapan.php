<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <div class="card-header mb-2">
                <h3 class="m-0 font-weight-bold text-primary">Form Tanggapan</h3>
            </div>
            <form action="/petugas/save_tanggapan" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="id_tanggapan">Pengaduan</label>
                    <input type="text" readonly class="form-control" value="" name="id_pengaduan" id="id_pengaduan" aria-describedby="emailHelpId" placeholder="">
                </div>

                <div class="form-group">
                    <label for="id_tanggapan">Tanggal Tanggapan</label>
                    <input type="text" class="form-control" name="tgl_tanggapan" id="tgl_tanggapan" aria-describedby="emailHelpId" readonly value="<?= date('d-m-Y'); ?>">
                </div>

                <div class="form-group">
                    <label for="id_tanggapan">Tanggapan</label>
                    <textarea type="textarea" class="form-control  <?= ($validation->hasError('tanggapan')) ? 'is-invalid' : ''; ?>" name="tanggapan" value="<?= old('tanggapan'); ?>" id="tanggapan" aria-describedby="emailHelpId" placeholder=""></textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('tanggapan'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_tanggapan">Nama Petugas</label>
                    <input type="text" readonly class="form-control" name="id_petugas" id="id_petugas" aria-describedby="emailHelpId" placeholder="" value="<?= session()->get('nama_petugas'); ?>">
                </div>
                <button type="submit" class="btn btn-success">Kirim</button>
            </form>

        </div>
    </div>

</div>

<?= $this->endSection(); ?>