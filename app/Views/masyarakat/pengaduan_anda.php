<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- <div class="row">
        <div class="col"> -->
    <div class="card-header mb-2">
        <h3 class="m-0">Data Pengaduan <span class="badge badge-primary"><?= session()->get('nama'); ?></span></h3>
    </div>

    <?php if (session()->getFlashdata('pesan')) { ?>
        <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php } ?>

    <?php if ($pgdn != null) { ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
                <a href="/masyarakat/tambah-pengaduan" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Pengaduan
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hovered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th scope="col">#</th>
                                <!-- <th scope="col">Nama</th>
                            <th scope="col">NIK</th> -->
                                <th scope="col">Tanggal Pengaduan</th>
                                <th scope="col">Isi Laporan</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no = 1;
                            foreach ($pgdn as $p) : ?>
                                <tr align="center">
                                    <th scope="row"><?= $no++; ?></th>
                                    <!-- <td><?= $p['nama']; ?></td>
                                    <td><?= $p['nik']; ?></td> -->
                                    <td><?= date('D, d-m-Y', strtotime($p['tgl_pengaduan'])); ?></td>
                                    <td><?= word_limiter($p['isi_laporan'], 50, '...'); ?></td>
                                    <td><img src="/img/<?= $p['foto']; ?>" alt="" width="100px"></td>
                                    <td><?php if ($p['status'] == '0') { ?>
                                            <span class="badge badge-warning">Belum Diproses</span>
                                        <?php } elseif ($p['status'] == 'proses') { ?>
                                            <span class="badge badge-info">Diproses</span>
                                        <?php } else { ?>
                                            <span class="badge badge-success">Selesai</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="/masyarakat/pengaduan/detail/<?= $p['id_pengaduan']; ?>" class="btn btn-success mb-2" title="Detail"><i class="fas fa-check"></i></a>
                                        <?php if ($p['status'] == '0') : ?>

                                            <a href="/masyarakat/pengaduan/edit/<?= $p['id_pengaduan']; ?>" class="btn btn-warning mb-2" title="Edit Pengaduan"><i class="fa fa-pen" aria-hidden="true"></i></a>
                                            <a href="/masyarakat/pengaduan/hapus/<?= $p['id_pengaduan']; ?>" class="btn btn-danger mb-2" onclick="return confirm('Apakah Anda yakin akan menghapusnya?')"><i class="fa fa-trash-alt" aria-hidden="true" title="Hapus"></i></a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="row d-flex justify-content-center">
            <div class="col-7">
                <div class="alert alert-info" role="alert">
                    <h5 class="font-weight-bold text-center">Belum ada pengaduan yang diajukan.</h5>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- </div>
    </div> -->
</div>
<?= $this->endSection(); ?>