<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card-header mb-2">
                <h3 class="m-0 font-weight-bold text-primary">Data Pengaduan <?= session()->get('nama'); ?></h6>
            </div>
            <a href="/masyarakat/tambah-pengaduan" class="btn btn-primary mb-2"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                Pengaduan
            </a>
            <?php if (session()->getFlashdata('pesan')) { ?>
                <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php } ?>

            <table class="table table-stripped table-hover table-bordered table-light">
                <thead>
                    <tr align="center">
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Tanggal Pengaduan</th>
                        <th scope="col">Isi Laporan</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($pgdn)) { ?>
                        <?php $no = 1;
                        foreach ($pgdn as $p) : ?>
                            <tr align="center">
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $p['nama']; ?></td>
                                <td><?= $p['nik']; ?></td>
                                <td><?= $p['tgl_pengaduan']; ?></td>
                                <td><?= $p['isi_laporan']; ?></td>
                                <td><img src="/img/<?= $p['foto']; ?>" alt="" width="100px"></td>
                                <td><?= $p['status']; ?></td>
                                <td>
                                    <a href="/masyarakat/pengaduan/detail/<?= $p['id_pengaduan']; ?>" class="btn btn-success mb-2" title="Detail"><i class="fas fa-check"></i></a>
                                    <a href="/masyarakat/form_tanggapan" class="btn btn-warning mb-2" title="Edit Pengaduan"><i class="fa fa-pen" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger mb-2" data-toggle="modal" data-target="#hapusPgdn"><i class="fa fa-trash-alt" aria-hidden="true" title="Hapus"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <div class="col">
                            <div class="alert alert-primary" role="alert">
                                Belum ada pengaduan yang diajukan.
                            </div>
                        </div>
                    <?php } ?>


                    <!-- Modal Hapus -->
                    <div class="modal fade" id="hapusPgdn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin akan menghapusnya?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>


                                </div>
                            </div>
                        </div>
                    </div>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>