// file: app/Views/admin/props_edit.php
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<style>
    .form-container { background-color: var(--sidebar-bg); padding: 20px; border-radius: 10px; margin-bottom: 20px; }
    .form-group { margin-bottom: 15px; }
    .form-group label { display: block; margin-bottom: 5px; color: var(--text-secondary); }
    .form-group input, .form-group textarea, .form-group select { width: 100%; padding: 10px; background-color: var(--bg-dark); border: 1px solid #333; border-radius: 5px; color: var(--text-light); box-sizing: border-box; }
    .btn-submit { background-color: var(--accent-blue); color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
    .current-img { max-width: 100px; border-radius: 5px; margin-top: 10px; }
</style>

<h2>Edit Props: <?= esc($prop['nama']) ?></h2>

<div class="form-container">
    <form action="<?= site_url('/admin/props/update/' . $prop['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="POST">
        
        <div class="form-group">
            <label for="nama">Nama Props</label>
            <input type="text" name="nama" id="nama" value="<?= old('nama', $prop['nama']) ?>" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3"><?= old('deskripsi', $prop['deskripsi']) ?></textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga Sewa (Rp)</label>
            <input type="number" name="harga" id="harga" value="<?= old('harga', $prop['harga']) ?>" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="tersedia" <?= ($prop['status'] == 'tersedia') ? 'selected' : '' ?>>Tersedia</option>
                <option value="disewa" <?= ($prop['status'] == 'disewa') ? 'selected' : '' ?>>Disewa</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar (Kosongkan jika tidak ingin ganti)</label>
            <input type="file" name="gambar" id="gambar">
            <p>Gambar Saat Ini:</p>
            <img src="<?= base_url('uploads/' . $prop['gambar']) ?>" alt="Current Image" class="current-img">
        </div>
        <button type="submit" class="btn-submit">Perbarui Props</button>
    </form>
</div>

<?= $this->endSection() ?>