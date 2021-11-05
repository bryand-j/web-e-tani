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
            <th>
                <img width="100" src="<?= base_url() ?>assets/logoLp.jpg">
            </th>
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
            <th>Perkiraan Tanggal Panen</th>
        </tr>
        <?php $no = 1;
        foreach ($tabel as $row) : ?>
            <?php $est = ((int) $row->estimasi_biaya * 1 + 0); ?>
            <tr>
                <td style="text-align: center;"><?= $no++ ?></td>
                <td style="text-align: center;"><?= $row->tgl_tanam ?></td>
                <td style="text-align: center;"><?= $row->nama_tanaman ?></td>
                <td style="text-align: center;"><?= $row->nama_poktan ?></td>
                <td style="text-align: center;"><?= $row->nama_pemilik ?></td>
                <td style="text-align: center;"><?= $row->jumlah_tanam ?></td>
                <td style="text-align: center;"><?= $row->status_penanaman ?></td>
                <td style="text-align: left;"><?= $row->kebutuhan ?></td>
                <td style="text-align: left;"><?= "Rp. " . number_format($est, 2, ',', '.'); ?></td>
                <td style="text-align: center;"><?= $row->perkiraan_tgl_panen ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script>
        window.print()
    </script>
</body>

</html>