<!DOCTYPE html>
<html>
<head>
    <title>Cetak Daftar Gaji Karyawan</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: center; }
    </style>
</head>
<body>
    <h2>Daftar Gaji Karyawan</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Karyawan</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Tj. Transport</th>
                <th>Uang Makan</th>
                <th>Potongan</th>
                <th>Total Gaji</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($gaji as $g): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $g['nik'] ?></td>
                    <td><?= $g['nama_pegawai'] ?></td>
                    <td><?= $g['jenis_kelamin'] ?></td>
                    <td><?= $g['jabatan'] ?></td>
                    <td><?= number_format($g['gaji_pokok'], 0, ',', '.') ?></td>
                    <td><?= number_format($g['tj_transpot'], 0, ',', '.') ?></td>
                    <td><?= number_format($g['uang_makan'], 0, ',', '.') ?></td>
                    <td><?= number_format($g['potongan'], 0, ',', '.') ?></td>
                    <td><?= number_format($g['total_gaji'], 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
