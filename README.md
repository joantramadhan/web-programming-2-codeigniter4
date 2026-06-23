# 📚 E-Library Management System
> **Laporan Project Akhir & Praktikum 1–14** > Mata Kuliah: Pemrograman Web 2 | Universitas Pelita Bangsa

Aplikasi *E-Library Management System* modern berbasis web yang mengadopsi arsitektur RESTful API dan *Single Page Application* (SPA). Dibangun secara komprehensif menggunakan **CodeIgniter 4**, **Vue.js 3**, **Tailwind CSS**, dan **MySQL**.

---

## 👨‍💻 Identitas Pengembang
- **Nama:** Joant Ramadhan
- **NIM:** 312410300
- **Kelas:** TI.24.D
- **Program Studi:** Teknik Informatika

---

## 📖 BAB 1 – Pendahuluan
### Latar Belakang
Pengelolaan data buku secara manual memiliki berbagai keterbatasan seperti kesulitan pencarian data, proses pembaruan yang lambat, dan kurangnya akses informasi secara *real-time*. Untuk mengatasi permasalahan operasional tersebut, dikembangkan sistem E-Library ini yang memisahkan layanan antarmuka (frontend) dan logika server (backend) agar pengelolaan perpustakaan menjadi lebih terstruktur dan *scalable*.

### Tujuan Utama
1. Mengimplementasikan capaian materi Praktikum 1–14.
2. Membangun aplikasi perpustakaan digital terpadu berbasis **REST API**.
3. Menerapkan konsep antarmuka mulus tanpa interupsi *reload* menggunakan **Single Page Application (SPA)**.
4. Mengintegrasikan frontend dan backend melalui komunikasi data asinkron.

---

## 🛠️ BAB 2 – Implementasi Praktikum 1–7 (Fundamental Web)
- **Praktikum 1 (HTML Dasar):** Membangun struktur kerangka semantik untuk halaman *Home*, *Login*, dan layout panel *Dashboard*.
- **Praktikum 2 (CSS Dasar):** Merancang tata letak yang rapi, memastikan antarmuka adaptif (*responsive design*), dan menyiapkan kerangka tema *Dark Mode*.
- **Praktikum 3 (Framework CSS):** Melakukan percepatan styling berpendekatan *utility-first* menggunakan **Tailwind CSS**. Mengaplikasikan komponen *grid system*, perancangan form, serta *card* buku yang bergaya premium.
- **Praktikum 4 (PHP Dasar):** Menyusun fondasi kontroler logika, *request handling*, hingga merakit struktur balasan dalam bentuk JSON statis.
- **Praktikum 5 (Database MySQL):** Membangun skema relasional tabel inti untuk entitas `users`, `kategori`, dan `buku`.
- **Praktikum 6 (CRUD):** Implementasi sirkulasi siklus data penuh (Create, Read, Update, Delete) di setiap modul entitas.
- **Praktikum 7 (Arsitektur MVC):** Menerapkan standar pola desain Model-View-Controller secara modular pada platform CodeIgniter 4.

---

## ⚡ BAB 3 – Implementasi Praktikum 8 (Vue.js SPA)
Frontend direpresentasikan dengan pendekatan SPA (Single Page Application) menggunakan ekosistem Vue.js.

- **Struktur Halaman Utama:** Komponen dipecah menjadi modul publik (Home, Katalog, Login) dan modul terproteksi (Dashboard Pusat, Manajemen Buku, Manajemen Kategori, Manajemen User).
- **Sistem Routing (Vue Router):** Menangani perpindahan navigasi halus di sisi klien.
  ```javascript
  const routes = [
    { path: '/', component: Home },
    { path: '/katalog', component: Katalog },
    { path: '/login', component: Login }
  ];


 ## 🔒 BAB 4 – Implementasi Praktikum 9–10 (AJAX dan Authentication)

**Asynchronous JavaScript and XML (AJAX) dengan Axios**
Pertukaran data asinkron pada proyek ini dikelola secara penuh oleh **Axios**, sebuah pustaka *Promise-based HTTP client*. Axios beroperasi sebagai *API Service* utama di sisi *frontend* untuk berinteraksi dengan *backend* tanpa memicu *reload* halaman. Seluruh *request* ke server dilakukan di balik layar, menghasilkan antarmuka yang sangat responsif.

**Sistem Autentikasi dan Local Storage**
E-Library menggunakan arsitektur *stateless*, di mana status sesi pengguna tidak disimpan di *memory* server. Sebagai gantinya, sistem menerapkan **Token Authentication**.
Setelah pengguna berhasil melakukan login, *backend* akan menerbitkan token akses unik yang kemudian disimpan oleh *frontend* ke dalam **Local Storage** pada peramban (*browser*) pengguna. Token ini bertindak sebagai "kunci pas" virtual.

**Alur Login (Login Flow)**
1. Pengguna memasukkan `useremail` dan `userpassword` pada komponen `<Login/>`.
2. Axios mengirim *HTTP POST request* berisi kredensial tersebut ke *endpoint* autentikasi *backend*.
3. Sistem *backend* mengevaluasi kredensial. Sesuai dengan spesifikasi arsitektur proyek ini, sistem memvalidasi kata sandi dengan mencocokkannya secara **plain text** (tanpa enkripsi) langsung terhadap *record* di dalam *database* MySQL.
4. Jika kredensial *plain text* tersebut valid, server menghasilkan *token* otorisasi dan merespons dengan *HTTP 200 OK* berserta *payload token*.
5. Vue.js menangkap respons tersebut, menyimpan *token* ke *Local Storage*, dan mengarahkan pengguna ke halaman Dasbor.

**Alur Logout (Logout Flow)**
Proses *logout* dilakukan murni di sisi klien. Aplikasi mengeksekusi fungsi yang akan menghapus *token* otorisasi dari *Local Storage*, mengosongkan *state* pengguna di Vue, lalu menggunakan Vue Router untuk melakukan *redirect* paksa kembali ke halaman Login. 

**Route Protection (Navigasi Terproteksi)**
Untuk menjaga rute internal seperti `/dashboard`, `/buku`, dan `/user` dari akses publik, Vue Router dikonfigurasi menggunakan *Navigation Guards* (`beforeEach`). Sistem akan memeriksa keberadaan *token* di *Local Storage* sebelum merender komponen. Jika *token* tidak ditemukan, upaya navigasi dicekal dan dialihkan ke rute `/login`.

---

## ⚙️ BAB 5 – Implementasi Praktikum 11 (CodeIgniter 4)

**Struktur Direktori Backend (CI4)**
*Backend* E-Library menerapkan pola arsitektur **MVC (Model-View-Controller)** yang disediakan oleh CodeIgniter 4. Dalam konteks REST API, fungsi *View* ditiadakan, sehingga arsitektur lebih berfokus pada pengolahan aliran data (*Controller*) dan abstraksi skema *database* (*Model*).

**Controller**
*Controller* berfungsi sebagai otak *backend* yang menangkap *request*, memvalidasi data masukan, berkoordinasi dengan *Model*, dan merakit respons *JSON*. Proyek ini mendefinisikan *controller* berikut:
1. **AuthController:** Mengatur verifikasi identitas (dengan algoritma komparasi *password* secara *plain text*) dan penerbitan *token*.
2. **DashboardController:** Mengagregasi data statistik sistem (seperti total buku dan total pengguna) untuk dirender pada *widget dashboard*.
3. **BukuController:** Memuat logika CRUD untuk entitas buku dan menangani unggahan (*upload*) berkas statis (cover buku).
4. **KategoriController:** Menangani pengelolaan klasifikasi/kategori buku, termasuk pembuatan *slug* berbasis URL secara otomatis.
5. **UserController:** Mengatur registrasi dan manajemen profil administrator maupun keanggotaan.

**Model**
*Model* menjembatani aplikasi dengan *database* MySQL secara presisi. Setiap tabel direpresentasikan oleh satu *Model* independen:
1. **BukuModel:** Terhubung ke tabel `buku`, mengelola *query* pencarian dan filter *join* dengan entitas kategori.
2. **KategoriModel:** Terhubung ke tabel `kategori`.
3. **UserModel:** Terhubung ke tabel `users`.

**Routing dan Filter Authentication**
Semua *endpoint* diletakkan di bawah *prefix* `/api`. Untuk mengamankan rute data sensitif, diterapkan **CI4 Filter Authentication**. Filter ini bertindak sebagai interseptor atau penjaga gerbang (*middleware*) yang menolak semua *HTTP Request* yang masuk ke *controller* terkait jika *request* tersebut tidak membawa *Bearer Token* yang sah pada *Header Authorization*.

**Sistem Upload Cover Buku**
*BukuController* memfasilitasi *upload* berkas asinkron. Data berkas dikirim dari *frontend* menggunakan format `multipart/form-data`. *Controller* akan mencegat *file*, memvalidasi ekstensi (MIME type) serta ukuran maksimalnya (misalnya maksimal 2MB), lalu memindahkan (*move*) file gambar secara fisik ke direktori `public/uploads/` di server *backend*, sembari menyimpan lintasan nama (*path*) berkas tersebut ke *database*.

---

## 🌐 BAB 6 – Implementasi Praktikum 12-14 (REST API)

**Konsep REST API (Representational State Transfer)**
E-Library beroperasi pada prinsip pertukaran data yang terstandardisasi dan *stateless*. Setiap *URI* merepresentasikan sebuah sumber daya (*resource*), dan aksi manipulasi atas sumber daya tersebut bergantung penuh pada *HTTP Verbs* standar (`GET`, `POST`, `PUT`, `DELETE`). Hal ini mempermudah integrasi berbagai tipe antarmuka (*client-agnostic*).

**Daftar Endpoint API E-Library**
Sistem *backend* memaparkan *endpoints* operasional sebagai berikut:
* `POST /api/login` *(Publik)*
* `GET /api/dashboard` *(Terproteksi)*
* `GET /api/buku` *(Publik/Terproteksi)*
* `POST /api/buku` *(Terproteksi)*
* `PUT /api/buku/{id}` *(Terproteksi)*
* `DELETE /api/buku/{id}` *(Terproteksi)*
* `GET /api/kategori` *(Publik/Terproteksi)*
* `POST /api/kategori` *(Terproteksi)*
* `PUT /api/kategori/{id}` *(Terproteksi)*
* `DELETE /api/kategori/{id}` *(Terproteksi)*
* `GET /api/user` *(Terproteksi)*
* `POST /api/user` *(Terproteksi)*
* `PUT /api/user/{id}` *(Terproteksi)*
* `DELETE /api/user/{id}` *(Terproteksi)*

**Contoh Format Request & Response JSON**
Format pertukaran data distandardisasi menggunakan format JSON (*JavaScript Object Notation*). 
*Contoh Request (POST /api/kategori):*
```json
{
  "nama_kategori": "Teknologi Informasi"
}
