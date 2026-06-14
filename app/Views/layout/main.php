<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'My Website' ?></title>
    <link rel="stylesheet" href="<?= base_url('style.css'); ?>">
</head>
<body>

<div id="container">

    <!-- HEADER -->
    <header>
        <h1>Layout Sederhana</h1>
    </header>

    <!-- NAVBAR -->
    <nav>
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('/artikel') ?>">Artikel</a>
        <a href="<?= base_url('/about') ?>">About</a>
        <a href="<?= base_url('/contact') ?>">Kontak</a>
    </nav>

    <!-- WRAPPER -->
    <section id="wrapper">

        <!-- MAIN CONTENT -->
        <section id="main">
            <?= $this->renderSection('content') ?>
        </section>

        <!-- SIDEBAR -->
        <aside id="sidebar">

            <?= view_cell('App\\Cells\\ArtikelTerkini::tampil') ?>

            <div class="widget-box">
                <h3 class="title">Widget Header</h3>
                <ul>
                    <li><a href="#">Widget Link</a></li>
                    <li><a href="#">Widget Link</a></li>
                </ul>
            </div>

            <div class="widget-box">
                <h3 class="title">Widget Text</h3>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto temporibus enim pariatur deleniti minima nobis amet necessitatibus! Ut quod iste non aliquam provident perspiciatis quia id eos, nobis earum voluptates..
                </p>
            </div>

        </aside>

    </section>

    <!-- FOOTER -->
    <footer>
        <p>&copy; 2026 - Web Praktikum</p>
    </footer>

</div>

</body>
</html>