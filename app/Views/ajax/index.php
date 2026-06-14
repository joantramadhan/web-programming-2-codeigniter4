<!DOCTYPE html>
<html>

<head>
    <title>AJAX Artikel</title>

    <script src="<?= base_url('asset/js/jquery-3.6.0.min.js') ?>"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">

        <h2>Data Artikel AJAX</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody id="data-artikel">
            </tbody>

        </table>

    </div>

    <script>

        function loadData() {
            $.ajax({
                url: "<?= base_url('ajax/getData') ?>",
                type: "GET",
                dataType: "json",

                success: function (response) {

                    let html = '';

                    $.each(response, function (i, item) {

                        html += `
                <tr>
                    <td>${item.id}</td>
                    <td>${item.judul}</td>
                    <td>${item.nama_kategori ?? '-'}</td>
                    <td>
                        <button class="btn btn-danger btn-sm btn-hapus"
                                data-id="${item.id}">
                            Hapus
                        </button>
                    </td>
                </tr>
                `;
                    });

                    $('#data-artikel').html(html);
                }
            });
        }
        loadData();
        
        $(document).on('click', '.btn-hapus', function () {

            let id = $(this).data('id');

            if (confirm('Yakin ingin menghapus data?')) {
                $.ajax({

                    url: "<?= base_url('ajax/delete') ?>/" + id,

                    type: "DELETE",

                    success: function () {

                        loadData();

                    }

                });
            }

        });
    </script>

</body>

</html>