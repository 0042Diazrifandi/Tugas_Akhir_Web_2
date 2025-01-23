<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h1>Edit Pegawai</h1>
    <form action="<?= site_url('pegawai/update/' . $pegawai['id']) ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" name="nik" id="nik" value="<?= $pegawai['nik'] ?>" required>
        </div>
        <div class="form-group">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" value="<?= $pegawai['nama_pegawai'] ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username"
