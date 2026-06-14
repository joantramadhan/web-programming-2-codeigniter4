<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="<?= base_url('asset/js/jquery-3.6.0.min.js') ?>"></script>
    <style>
.pagination{
    display:flex;
    justify-content:center;
    margin-top:20px;
}

.pagination li{
    list-style:none;
}

.pagination a,
.pagination span{
    padding:8px 14px;
    margin:0 4px;
    border:1px solid #0d6efd;
    border-radius:8px;
    text-decoration:none;
}

.pagination .active a,
.pagination .active span{
    background:#0d6efd;
    color:white;
}
</style>
</head>

<body>
<div class="container mt-5">

    <h2>Dashboard Admin</h2>

    <a href="/admin/tambah" class="btn btn-success mb-3">
        Tambah Artikel Baru
    </a>

    <!-- FORM SEARCH -->
    <form id="form-search" method="get" class="mb-3">
        <div class="input-group">
            <input
                type="text"
                name="q"
                id ="q"
                class="form-control"
                placeholder="Cari Judul Artikel..."
                value="<?= $q ?? '' ?>">

            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">
                    Cari
                </button>
            </div>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
    <th width="10%">ID</th>
    <th>Judul</th>
    <th>Kategori</th>
    <th width="25%">Aksi</th>
</tr>
        </thead>

        <tbody id="data-artikel">
            <?php if(count($artikel) > 0): ?>

                <?php foreach($artikel as $a): ?>

                <tr>
                    <td><?= $a['id']; ?></td>

                    <td>
                        <?= $a['judul']; ?>
                    </td>

                    <td>
    <?= $a['nama_kategori'] ?? '-'; ?>
</td>

                    <td>
                        <a href="/admin/edit/<?= $a['id']; ?>"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a href="/admin/hapus/<?= $a['id']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>

                <?php endforeach; ?>

            <?php else: ?>

                <tr>
                    <td colspan="3" class="text-center">
                        Data tidak ditemukan
                    </td>
                </tr>

            <?php endif; ?>
        </tbody>
    </table>

    <!-- PAGINATION -->
    <div id="pagination-area" class="mt-4 d-flex justify-content-center">
    <?= $pager->only(['q'])->links(); ?>
</div>

    <br>

    <a href="/auth/logout" class="btn btn-secondary">
        Logout
    </a>

</div>
<script>
$(document).ready(function(){

    $('#form-search').submit(function(e){

        e.preventDefault();

        let q = $('#q').val();

        $.ajax({

            url: "<?= base_url('admin/dashboard') ?>",

            type: "GET",

            data: {
                q: q
            },

            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },

            dataType: "json",

            success: function(response){
                
                console.log(response);

                let html = '';

                $.each(response.artikel, function(i, item){

                    html += `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.judul}</td>
                        <td>${item.nama_kategori ?? '-'}</td>
                        <td>
                            <a href="/admin/edit/${item.id}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="/admin/hapus/${item.id}"
                               class="btn btn-danger btn-sm">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    `;
                });

                $('#data-artikel').html(html);

            }

        });

    });

});
</script>
</body>
</html>

