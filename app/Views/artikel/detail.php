<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<article class="entry">
    <h2><?= $artikel['judul'] ?></h2>

    <p>
        <?= $artikel['isi'] ?>
    </p>
</article>

<?= $this->endSection() ?>