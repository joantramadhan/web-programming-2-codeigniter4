<?php
namespace App\Controllers;

use App\Models\ArtikelModel;
use App\Models\KategoriModel;

class Artikel extends BaseController
{

    protected $artikelModel;

    // Konstruktor untuk inisialisasi Model
    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
    }

    // Halaman untuk User Biasa
    public function index()
    {
        $data['artikel'] = $this->artikelModel->findAll();
        return view('artikel/index', $data);
    }

    // Halaman untuk Admin
    public function adminIndex()
{
    $q = $this->request->getVar('q') ?? '';
    $kategori_id = $this->request->getVar('kategori_id') ?? '';
    $page = $this->request->getVar('page') ?? 1;

    $builder = $this->artikelModel
        ->select('artikel.*, kategori.nama_kategori')
        ->join(
            'kategori',
            'kategori.id_kategori = artikel.id_kategori',
            'left'
        );

    if ($q != '') {
        $builder->like('artikel.judul', $q);
    }

    if ($kategori_id != '') {
        $builder->where('artikel.id_kategori', $kategori_id);
    }

    $artikel = $builder->paginate(5, 'default', $page);

    $data = [
        'artikel'      => $artikel,
        'pager'        => $this->artikelModel->pager,
        'q'            => $q,
        'kategori_id'  => $kategori_id
    ];

    if ($this->request->isAJAX()) {
        return $this->response->setJSON($data);
    }

    $kategoriModel = new KategoriModel();
    $data['kategori'] = $kategoriModel->findAll();

    return view('admin/dashboard', $data);
}
    public function tambah()
{
    $kategoriModel = new KategoriModel();

    $data['kategori'] = $kategoriModel->findAll();

    return view('admin/tambah', $data);
}


    public function simpan()
    {
        $judul = $this->request->getVar('judul');
        $isi = $this->request->getVar('isi');
        $slug = url_title($judul, '-', true);
        $id_kategori = $this->request->getVar('id_kategori');

        // Ambil file gambar dari form
        $gambar = $this->request->getFile('gambar');

        // Jika user memilih file
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {

            // Ambil nama random supaya tidak bentrok
            $namaGambar = $gambar->getRandomName();

            // Simpan ke folder public/gambar
            $gambar->move(ROOTPATH . 'public/gambar', $namaGambar);

        } else {

            // Jika tidak upload gambar
            $namaGambar = null;
        }

       $this->artikelModel->save([
    'judul'       => $judul,
    'isi'         => $isi,
    'slug'        => $slug,
    'gambar'      => $namaGambar,
    'id_kategori' => $id_kategori
]);

        return redirect()->to('/admin/dashboard');
    }
    // --- TAMBAHKAN KODE INI DI BAWAH FUNGSI SIMPAN ---

    public function edit($id)
{
    $data['artikel'] = $this->artikelModel->find($id);

    if (!$data['artikel']) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $kategoriModel = new KategoriModel();
    $data['kategori'] = $kategoriModel->findAll();

    return view('admin/edit', $data);
}

   public function update($id)
{
    $judul = $this->request->getVar('judul');
    $isi = $this->request->getVar('isi');
    $id_kategori = $this->request->getVar('id_kategori');

    $slug = url_title($judul, '-', true);

    $this->artikelModel->update($id, [
        'judul'       => $judul,
        'isi'         => $isi,
        'slug'        => $slug,
        'id_kategori' => $id_kategori
    ]);

    return redirect()->to('/admin/dashboard');
}

    public function hapus($id)
    {
        // Langsung eksekusi hapus berdasarkan ID
        $this->artikelModel->delete($id);

        return redirect()->to('/admin/dashboard');
    }
}