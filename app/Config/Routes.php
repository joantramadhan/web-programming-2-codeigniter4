<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// HALAMAN UTAMA & AUTH
// Halaman Pilihan Awal
$routes->get('/', 'Auth::index');
$routes->get('/about', 'Page::about'); // Buat Home Controller jika perlu
$routes->get('/contact', 'Page::contact'); // Buat Home Controller jika perlu


// Auth Admin
$routes->get('/auth/loginAdmin', 'Auth::loginAdmin');
$routes->post('/auth/cekLoginAdmin', 'Auth::cekLoginAdmin');

// Auth User
$routes->get('/auth/loginUser', 'Auth::loginUser');
$routes->post('/auth/cekLoginUser', 'Auth::cekLoginUser');

$routes->get('/auth/logout', 'Auth::logout');
// KELOMPOK USER (Hanya Lihat)
$routes->group('user', function($routes) {
    $routes->get('artikel', 'Artikel::index');
    $routes->get('detail/(:any)', 'Artikel::detail/$1');
    $routes->get('about', 'Page::about'); // Buat Page Controller jika perlu
    
    
});
$routes->get('/artikel', 'Page::artikel');
$routes->get('/artikel/(:any)', 'Page::detail/$1');
// KELOMPOK ADMIN (Kunci dengan Filter)
$routes->group('admin', ['filter' => 'authFilter'], function($routes) {
    $routes->get('dashboard', 'Artikel::adminIndex');
    $routes->get('tambah', 'Artikel::tambah');
    $routes->post('simpan', 'Artikel::simpan');
    $routes->get('edit/(:num)', 'Artikel::edit/$1');
    $routes->post('update/(:num)', 'Artikel::update/$1');
    $routes->get('hapus/(:num)', 'Artikel::hapus/$1');
});
// AJAX
    $routes->get('ajax', 'AjaxController::index');
    $routes->get('ajax/getData', 'AjaxController::getData');
    $routes->delete('ajax/delete/(:num)', 'AjaxController::delete/$1');

    $routes->resource('post');