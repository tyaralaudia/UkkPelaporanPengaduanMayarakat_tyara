<?= $this->extend('layout/template'); ?>
<!-- file ini nyambung ke layout template
penempatan html ini di rendeersection(penanda) -->
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= "Selamat datang " . '<strong>' . session()->get('nama_petugas') . '</strong>'; ?></h1>
        <?php if (session()->get('level') == 'admin') { ?>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Laporan</a>
        <?php } ?>
    </div>
    <!-- <div class="container"> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr align="center">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Telepon</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pengaduan as $p) : ?>
                            <tr align="center">
                                <th scope="row"><?= $no++; ?></th>
                                <th scope="row"><?= $p['nik']; ?></th>
                                <td><?= $p['nama']; ?></td>
                                <td><?= $p['tgl_pengaduan']; ?></td>
                                <td><?= $p['isi_laporan']; ?></td>
                                <td><img src="/img/<?= $p['foto']; ?>" alt="" width="100px"></td>
                                <td><?= $p['status']; ?></td>
                                <td><?= $p['telp']; ?></td>
                                <td>
                                    <a href="/petugas/pengaduan/detail" class="btn btn-success mb-2" title="Detail"><i class="fas fa-check"></i></a>
                                    <a href="/petugas/form-tanggapan" class="btn btn-primary mb-2" title="Tambah Tanggapan"><i class="fas fa-plus"></i></a>
                                    <a href="/petugas/pengaduan/hapus" class="btn btn-danger mb-2" title="Hapus"><i class="fa fa-trash-alt" aria-hidden="true"></i></a>
                                </td>

                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- </div> -->
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?= $this->endSection(); ?>