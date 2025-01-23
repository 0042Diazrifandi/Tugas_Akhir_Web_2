<?= $this->extend('/Admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>Edit Potongan Gaji</h2>
    <form action="<?= base_url('/potongan-gaji/update/' . $potonganGaji['id']) ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="potongan" class="form-label">Potongan</label>
            <input type="text" id="potongan" name="potongan" class="form-control" value="<?= $potonganGaji['potongan'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="jml_potongan" class="form-label">Jumlah Potongan</label>
            <input type="number" id="jml_potongan" name="jml_potongan" class="form-control" value="<?= $potonganGaji['jml_potongan'] ?>" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?= $this->endSection() ?>