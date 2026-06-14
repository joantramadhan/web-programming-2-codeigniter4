<!DOCTYPE html>
<html>
<head>
    <title>Edit Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">

    <h3>Edit Artikel</h3>

    <form action="/admin/update/<?= $artikel['id']; ?>" method="post">

        <div class="mb-3">
            <label>Judul</label>
            <input type="text"
                   name="judul"
                   class="form-control"
                   value="<?= $artikel['judul']; ?>"
                   required>
        </div>

        <div class="mb-3">
            <label>Isi Artikel</label>
            <textarea
                name="isi"
                class="form-control"
                rows="5"
                required><?= $artikel['isi']; ?></textarea>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="id_kategori" class="form-control">

                <?php foreach ($kategori as $k): ?>

                    <option value="<?= $k['id_kategori']; ?>"
                        <?= ($artikel['id_kategori'] == $k['id_kategori']) ? 'selected' : ''; ?>>

                        <?= $k['nama_kategori']; ?>

                    </option>

                <?php endforeach; ?>

            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="/admin/dashboard" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>
</body>
</html>