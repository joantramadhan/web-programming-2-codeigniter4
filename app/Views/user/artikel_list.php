<head>
    <title>Daftar Artikel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">PORTAL ARTIKEL</a>
        <div class="d-flex">
            <span class="navbar-text text-white me-3">
                Halo, <strong><?= session()->get('username'); ?></strong>
            </span>
            <a href="/auth/logout" class="btn btn-light btn-sm text-primary fw-bold">Logout</a>
        </div>
    </div>
</nav>
<div class="row">
    <?php foreach($artikel as $a) : ?>
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title fw-bold"><?= $a['judul']; ?></h5>
                <p class="text-muted"><?= substr($a['isi'], 0, 100); ?>...</p>
                
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail<?= $a['id']; ?>">
                    Baca Selengkapnya
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDetail<?= $a['id']; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold"><?= $a['judul']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="white-space: pre-line;"><?= $a['isi']; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>