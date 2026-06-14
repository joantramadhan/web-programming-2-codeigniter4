<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Page extends BaseController
{
    public function artikel()
    {
        $model = new ArtikelModel();

        $data = [
            'title' => 'Daftar Artikel',
            'artikel' => $model->findAll()
        ];

        return view('artikel/index', $data);
    }

    // ✅ TAMBAH INI
    public function about()
    {
        return view('about', [
            'title' => 'Halaman About',
            'content' => 'Ini adalah halaman about yang menjelaskan tentang website ini.'
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'title' => 'Halaman Kontak',
            'content' => 'Ini adalah halaman kontak.'
        ]);
    }
    public function detail($slug)
{
    $model = new \App\Models\ArtikelModel();

    $artikel = $model->where(['slug' => $slug])->first();

    if (!$artikel) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    return view('artikel/detail', [
        'title' => $artikel['judul'],
        'artikel' => $artikel
    ]);
}
}