
<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<style>
    .form-container, .table-container { background-color: var(--sidebar-bg); padding: 20px; border-radius: 10px; margin-bottom: 20px; }
    .form-group { margin-bottom: 15px; }
    .form-group label { display: block; margin-bottom: 5px; color: var(--text-secondary); }
    .form-group input, .form-group textarea { width: 100%; padding: 10px; background-color: var(--bg-dark); border: 1px solid #333; border-radius: 5px; color: var(--text-light); box-sizing: border-box; }
    .btn-submit { background-color: var(--accent-blue); color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
    .alert { padding: 15px; margin-bottom: 20px; border-radius: 5px; }
    .alert-success { background-color: #27ae60; color: #fff; }
    .alert-danger { background-color: #e74c3c; color: #fff; }
    .props-table { width: 100%; border-collapse: collapse; }
    .props-table th, .props-table td { padding: 12px; border-bottom: 1px solid #333; text-align: left; }
    .props-table th { color: var(--text-secondary); }
    .props-table img { width: 60px; height: 60px; object-fit: cover; border-radius: 5px; }
</style>

<h2>Manajemen Katalog Props</h2>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<?php if(session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul>
        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
            <li><?= esc($error) ?></li>
        <?php endforeach ?>
        </ul>
    </div>
<?php endif; ?>

<div class="form-container">
    <h3>Tambah Props Baru</h3>
    <form action="<?= site_url('/admin/props/store') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="nama">Nama Props</label>
            <input type="text" name="nama" id="nama" value="<?= old('nama') ?>" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3"><?= old('deskripsi') ?></textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga Sewa (Rp)</label>
            <input type="number" name="harga" id="harga" value="<?= old('harga') ?>" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar" required>
        </div>
        <button type="submit" class="btn-submit">Simpan Props</button>
    </form>
</div>

<div class="table-container">
    <h3>Daftar Props</h3>
    <table class="props-table">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Aksi</th> </tr>
        </thead>
        <tbody>
            <?php foreach($props_list as $prop): ?>
            <tr>
                <td><img src="<?= base_url('uploads/' . $prop['gambar']) ?>" alt="<?= esc($prop['nama']) ?>"></td>
                <td><?= esc($prop['nama']) ?></td>
                <td>Rp <?= number_format($prop['harga'], 0, ',', '.') ?></td>
                <td><?= esc($prop['status']) ?></td>
                <td>
                    <a href="<?= site_url('admin/props/edit/' . $prop['id']) ?>" class="btn-edit">Edit</a>
                    <a href="<?= site_url('admin/props/delete/' . $prop['id']) ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus props ini?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
/* Tambahkan style ini di dalam tag <style> yang sudah ada atau di bawahnya */
.btn-edit, .btn-delete {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    font-size: 0.8rem;
}
.btn-edit { background-color: #f39c12; }
.btn-delete { background-color: #e74c3c; }
</style>

<?= $this->endSection() ?>