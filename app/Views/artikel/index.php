<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<h1><?= $title ?></h1>

<?php if ($artikel): ?>
    <?php foreach ($artikel as $row): ?>
        <article class="entry">
            <h2>
                <a href="<?= base_url('/artikel/' . $row['slug']); ?>">
                    <?= esc($row['judul']); ?>
                </a>
            </h2>

            <p>
                <?= substr(strip_tags($row['isi']), 0, 200); ?>...
            </p>
        </article>

        <hr class="divider">
    <?php endforeach; ?>
<?php else: ?>
    <p>Belum ada data.</p>
<?php endif; ?>

<?= $this->endSection() ?>