<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ArtikelModel;

class Post extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        $model = new ArtikelModel();

        $data['artikel'] = $model
            ->orderBy('id', 'DESC')
            ->findAll();

        return $this->respond($data);
    }
    // GET /post/1
public function show($id = null)
{
    $model = new ArtikelModel();

    $data = $model->find($id);

    if ($data) {
        return $this->respond($data);
    }

    return $this->failNotFound('Data tidak ditemukan');
}
// POST /post
public function create()
{
    $model = new ArtikelModel();

    $data = [
        'judul' => $this->request->getVar('judul'),
        'isi'   => $this->request->getVar('isi')
    ];

    $model->insert($data);

    return $this->respondCreated([
        'status' => 201,
        'message' => 'Data berhasil ditambahkan'
    ]);
}
// PUT /post/1
public function update($id = null)
{
    $model = new ArtikelModel();

    $data = [
        'judul' => $this->request->getVar('judul'),
        'isi'   => $this->request->getVar('isi')
    ];

    $model->update($id, $data);

    return $this->respond([
        'status' => 200,
        'message' => 'Data berhasil diubah'
    ]);
}
// DELETE /post/1
public function delete($id = null)
{
    $model = new ArtikelModel();

    if (!$model->find($id)) {
        return $this->failNotFound('Data tidak ditemukan');
    }

    $model->delete($id);

    return $this->respondDeleted([
        'status' => 200,
        'message' => 'Data berhasil dihapus'
    ]);
}
}