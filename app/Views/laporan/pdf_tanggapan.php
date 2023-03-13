<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan | PDF</title>
</head>

<style>
    h1 {
        text-align: center;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-weight: 300;
    }

    table {
        margin: 30px 0;
        width: 100%;
    }

    table,
    th,
    td {
        border: 1px solid #444;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
    }

    .text-center {
        text-align: center !important;
    }
</style>

<body>
    <h1>Laporan Pengaduan</h1>
    <?php if (isset($date)) : ?>
        <h1>Tanggal <?= $date; ?></h1>
    <?php endif ?>

    <hr>

    <table>
        <thead>
            <tr align="center">
                <th scope="col">#</th>
                <th scope="col">Nama | NIK</th>
                <th scope="col">Isi Pengaduan</th>
                <th scope="col">Tanggapan</th>
                <th scope="col">Petugas</th>
                <th scope="col">Status</th>
                <!-- <th scope="col">Aksi</th> -->
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($tgpn as $t) : ?>
                <tr align="center">
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= "{$t['nama']} | {$t['nik']}"; ?></td>
                    <td><?= "{$t['isi_laporan']} ({$t['tgl_pengaduan']})"; ?></td>
                    <td><?= "{$t['tanggapan']} ({$t['tgl_tanggapan']})"; ?></td>
                    <td><?= $t['nama_petugas']; ?></td>
                    <!-- <td><?= date('d/m/Y', strtotime($t['tgl_pengaduan'])); ?></td> -->
                    <!-- <td><?= $t['isi_laporan']; ?></td> -->
                    <td><?php if ($t['status'] == '0') { ?>
                            <span class="badge badge-warning">Belum Diproses</span>
                        <?php } elseif ($t['status'] == 'proses') { ?>
                            <span class="badge badge-info">Diproses</span>
                        <?php } else { ?>
                            <span class="badge badge-success">Selesai</span>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>