<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container mt-5">
    <h3>Tambah Artikel Baru</h3>
    <form action="/admin/simpan" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
    <label>Isi Artikel</label>
    <textarea name="isi" class="form-control" rows="5" required></textarea>
</div>
<div class="mb-3">
    <label>Kategori</label>
    <select name="id_kategori" class="form-control" required>
        <?php foreach ($kategori as $k): ?>
            <option value="<?= $k['id_kategori']; ?>">
                <?= $k['nama_kategori']; ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<div class="mb-3">
    <label>Gambar Artikel</label>
    <input type="file" name="gambar" class="form-control">
</div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="dashboard" class="btn btn-secondary">Kembali</a>
    </form>
</div>