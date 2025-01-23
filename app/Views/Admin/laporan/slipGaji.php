<!-- app/Views/Admin/laporan/slipGaji.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji - <?= $pegawai['nama_pegawai'] ?></title>
    <link rel="stylesheet" href="path/to/bootstrap.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-5">Slip Gaji - <?= $pegawai['nama_pegawai'] ?></h2>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <h4>Data Pegawai</h4>
                <p><strong>Nama:</strong> <?= $pegawai['nama_pegawai'] ?></p>
                <p><strong>Jabatan:</strong> <?= $jabatan['nama_jabatan'] ?></p>
                <p><strong>Status:</strong> <?= $pegawai['status'] ?></p>
            </div>
            <div class="col-md-6">
                <h4>Slip Gaji</h4>
                <p><strong>Gaji Pokok:</strong> Rp <?= number_format($jabatan['gaji_pokok'], 0, ',', '.') ?></p>
                <p><strong>Tunjangan Transport:</strong> Rp <?= number_format($jabatan['tj_transpot'], 0, ',', '.') ?></p>
                <p><strong>Uang Makan:</strong> Rp <?= number_format($jabatan['uang_makan'], 0, ',', '.') ?></p>
                <p><strong>Potongan Alpha:</strong> Rp <?= number_format($potongan_alpha, 0, ',', '.') ?></p>
                <p><strong>Total Gaji:</strong> Rp <?= number_format($total_gaji, 0, ',', '.') ?></p>
            </div>
        </div>

        <a href="index.php" class="btn btn-primary mt-4">Kembali</a>
    </div>
</body>
</html>
