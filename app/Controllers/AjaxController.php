<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
use CodeIgniter\Controller;

class AjaxController extends Controller
{
    public function index()
    {
        return view('ajax/index');
    }

    public function getData()
    {
        $model = new ArtikelModel();

        $data = $model
            ->select('artikel.*, kategori.nama_kategori')
            ->join(
                'kategori',
                'kategori.id_kategori = artikel.id_kategori',
                'left'
            )
            ->findAll();

        return $this->response->setJSON($data);
    }

    public function delete($id)
    {
        $model = new ArtikelModel();

        $model->delete($id);

        return $this->response->setJSON([
            'status' => 'OK'
        ]);
    }
}