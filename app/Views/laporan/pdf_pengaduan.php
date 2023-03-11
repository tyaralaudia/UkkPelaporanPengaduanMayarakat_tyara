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
    <!--jdi klo d vriabel  $data mka tmolkan itu , kalo sinya ga kosong tmpilkn itu klo variabelny isinya kosong i kt itu gbkal ditmpilin. 
tmpilin kat tnggal cth:28...  -->
    <h1>Laporan Pengaduan</h1>
    <?php if (isset($date)) : ?>
        <h1>Tanggal <?= $date; ?></h1>
    <?php endif ?>

    <hr>

    <table>
        <thead>
            <th>#</th>
            <th>Nama/NIK</th>
            <th>Isi Pengaduan</th>
            <th>Tgl Pengaduan</th>
            <th>Status</th>
            <th>No. Telp Pelapor</th>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($pgdn as $p) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td class="text-center"><?= "{$p['nama']} /{$p['nik']}"; ?></td>
                    <td><?= $p['isi_laporan']; ?></td>
                    <td class="text-center"><?= $p['tgl_pengaduan']; ?></td>
                    <td class="text-center"><?php if ($p['status'] == '0') { ?>
                            Belum Diproses
                        <?php } elseif ($p['status'] == 'proses') { ?>
                            Diproses
                        <?php } else { ?>
                            Selesai
                        <?php } ?></td>
                    <td class="text-center"><?= $p['telp']; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>