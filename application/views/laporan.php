<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penanaman</title>
    <style>
        table#tabel1,
        #tabel1 th,
        #tabel1 td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table width="100%">
        <tr>
            <th>ini Logo</th>
            <th>
                <h2>
                    DINAS PERTANIAN PROVINSI NUSA TENGGARA TIMUR </br>
                    LAPORAN PENANAMAN LAHAN TAHUN <?= $tahun ?>
                </h2>
            </th>
        </tr>
    </table>
    <hr>
    </br>
    <table id="tabel1" cellspacing="0" width="100%">
        <tr>
            <th>No</th>
            <th>Tanggal Penanaman</th>
            <th>Nama Tanaman</th>
            <th>Kelompok Tani</th>
            <th>Pemilik Lahan</th>
            <th>Jumlah Tanam</th>
            <th>Status Penanaman</th>
            <th>Kebutuhan</th>
            <th>Estimasi Biaya</th>
            <th>Realisasi Kebutuhan</th>
            <th>Perkiraan Tanggal Panen</th>
        </tr>
        <?php $no = 1;
        foreach ($tabel as $row) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row->tgl_tanam ?></td>
                <td><?= $row->nama_tanaman ?></td>
                <td><?= $row->nama_poktan ?></td>
                <td><?= $row->nama_pemilik ?></td>
                <td><?= $row->jumlah_tanam ?></td>
                <td><?= $row->status_penanaman ?></td>
                <td><?= $row->kebutuhan ?></td>
                <td><?= $row->estimasi_biaya ?></td>
                <td><?= $row->realisasi_kebutuhan ?></td>
                <td><?= $row->perkiraan_tgl_panen ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script>
        window.print()
    </script>
</body>

</html>