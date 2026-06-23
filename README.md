# 📰 Portal Artikel Berbasis REST API

> **Laporan Praktikum Pemrograman Web 2 (Praktikum 1–14)**
> Universitas Pelita Bangsa

Aplikasi Portal Artikel merupakan sistem manajemen konten berbasis web yang dikembangkan secara bertahap melalui rangkaian Praktikum Pemrograman Web 2. Aplikasi ini menerapkan konsep Frontend dan Backend terpisah dengan memanfaatkan CodeIgniter 4 sebagai REST API dan Vue.js sebagai antarmuka pengguna.

---

## 👨‍💻 Identitas Mahasiswa

* **Nama:** Joant Ramadhan
* **NIM:** 312410594
* **Kelas:** I241D
* **Program Studi:** Teknik Informatika

---

# 📖 BAB 1 – Pendahuluan

## Latar Belakang

Penyampaian informasi melalui media digital menjadi kebutuhan yang semakin penting dalam perkembangan teknologi web. Salah satu bentuk implementasinya adalah Portal Artikel yang memungkinkan pengguna mengelola dan mempublikasikan informasi secara terstruktur.

Melalui proyek ini, mahasiswa mempelajari penerapan teknologi frontend dan backend modern dengan menggabungkan Vue.js, CodeIgniter 4, REST API, dan MySQL ke dalam satu aplikasi yang terintegrasi.

## Tujuan

1. Memahami konsep pengembangan aplikasi web modern.
2. Menerapkan arsitektur REST API menggunakan CodeIgniter 4.
3. Mengembangkan antarmuka Single Page Application menggunakan Vue.js.
4. Mengintegrasikan frontend dan backend melalui komunikasi data berbasis JSON.
5. Mengimplementasikan operasi CRUD pada data artikel dan kategori.

---

# 🛠️ BAB 2 – Implementasi Praktikum 1–7

Pada tahap awal praktikum, fokus pembelajaran diarahkan pada penguasaan dasar pengembangan web mulai dari struktur halaman menggunakan HTML, pengaturan tampilan dengan CSS, pengolahan data menggunakan PHP, hingga perancangan basis data MySQL.

Materi-materi tersebut menjadi fondasi utama sebelum memasuki pengembangan aplikasi Portal Artikel yang lebih kompleks pada praktikum selanjutnya.

## ⚡ BAB 3 – Implementasi Praktikum 8 (Vue.js SPA)

Frontend aplikasi Portal Artikel dikembangkan menggunakan Vue.js dengan pendekatan Single Page Application (SPA). Pendekatan ini memungkinkan perpindahan halaman dilakukan tanpa melakukan reload penuh sehingga pengalaman pengguna menjadi lebih cepat dan responsif.

### Struktur Halaman

Aplikasi dibagi menjadi beberapa halaman utama:

* Halaman Login
* Dashboard
* Manajemen Artikel
* Manajemen Kategori
* Halaman Publik Artikel

### Vue Router

Vue Router digunakan untuk mengatur navigasi antar halaman. Setiap halaman direpresentasikan sebagai komponen yang akan dirender sesuai dengan URL yang diakses pengguna.

Keuntungan penggunaan Vue Router antara lain:

* Navigasi lebih cepat
* Tidak memerlukan reload halaman
* Struktur aplikasi lebih modular
* Mendukung route protection

### Komponen Vue

Setiap fitur dikembangkan menggunakan komponen yang terpisah sehingga lebih mudah dipelihara dan dikembangkan.

Contoh komponen:

* Login.js
* Dashboard.js
* Artikel.js
* Kategori.js
* Home.js

---

# 🔒 BAB 4 – Implementasi Praktikum 9 (AJAX dan Axios)

Pada praktikum ini dipelajari komunikasi data antara frontend dan backend menggunakan konsep AJAX.

### Axios

Axios digunakan sebagai HTTP Client untuk mengirim request ke REST API yang disediakan oleh CodeIgniter 4.

Fungsi utama Axios dalam aplikasi:

* Mengambil data artikel
* Menambahkan artikel baru
* Memperbarui artikel
* Menghapus artikel
* Melakukan proses login

### Keuntungan Penggunaan Axios

* Sintaks lebih sederhana
* Mendukung Promise
* Penanganan error lebih mudah
* Terintegrasi dengan Vue.js

### Implementasi pada Portal Artikel

Setiap data yang ditampilkan pada halaman artikel dan kategori berasal dari API sehingga perubahan data dapat langsung terlihat tanpa perlu melakukan refresh halaman.

---

# 🔐 BAB 5 – Implementasi Praktikum 10 (Authentication)

Authentication merupakan proses verifikasi pengguna sebelum dapat mengakses fitur administrasi.

### Sistem Login

Pengguna memasukkan username dan password pada halaman login.

Setelah tombol login ditekan:

1. Data dikirim ke backend menggunakan Axios.
2. Backend melakukan validasi akun.
3. Jika valid, sistem mengirimkan token autentikasi.
4. Token disimpan pada Local Storage.
5. Pengguna diarahkan ke Dashboard.

### Logout

Logout dilakukan dengan menghapus token dari Local Storage sehingga pengguna harus melakukan login kembali untuk mengakses fitur administrasi.

### Route Protection

Halaman administrasi hanya dapat diakses jika token autentikasi tersedia. Jika token tidak ditemukan, pengguna akan diarahkan kembali ke halaman login.

---

# ⚙️ BAB 6 – Implementasi Praktikum 11 (CodeIgniter 4)

Pada tahap ini aplikasi backend mulai dibangun menggunakan framework CodeIgniter 4.

### Arsitektur MVC

CodeIgniter 4 menerapkan pola Model-View-Controller (MVC) untuk memisahkan logika aplikasi.

### Controller

Controller bertugas menerima request dari frontend dan mengembalikan response dalam format JSON.

Controller yang digunakan antara lain:

* AuthController
* ArtikelController
* KategoriController
* DashboardController

### Model

Model digunakan untuk berinteraksi dengan database.

Model yang digunakan:

* ArtikelModel
* KategoriModel
* UserModel

### Routing

Routing digunakan untuk menghubungkan URL dengan controller yang sesuai sehingga setiap endpoint dapat diakses melalui URL tertentu.

---

# 🌐 BAB 7 – Implementasi Praktikum 12 (REST API)

REST API digunakan sebagai penghubung antara frontend Vue.js dan backend CodeIgniter 4.

### Konsep REST API

REST API memungkinkan pertukaran data menggunakan format JSON melalui protokol HTTP.

Metode yang digunakan:

| Method | Fungsi           |
| ------ | ---------------- |
| GET    | Mengambil data   |
| POST   | Menambah data    |
| PUT    | Memperbarui data |
| DELETE | Menghapus data   |

### Endpoint Artikel

```http
GET /api/artikel
POST /api/artikel
PUT /api/artikel/{id}
DELETE /api/artikel/{id}
```

### Endpoint Kategori

```http
GET /api/kategori
POST /api/kategori
PUT /api/kategori/{id}
DELETE /api/kategori/{id}
```

### Endpoint Login

```http
POST /api/login
```

### Format Response

Seluruh data dikirim menggunakan format JSON sehingga dapat diproses dengan mudah oleh frontend.

---

# 🔄 BAB 8 – Implementasi Praktikum 13 (Integrasi Frontend dan Backend)

Setelah frontend dan backend selesai dikembangkan secara terpisah, tahap berikutnya adalah melakukan integrasi.

### Arsitektur Sistem

```text
Vue.js Frontend
       │
       │ Axios
       ▼
CodeIgniter 4 REST API
       │
       ▼
MySQL Database
```

### Proses Integrasi

1. Frontend mengirim request menggunakan Axios.
2. Backend menerima request.
3. Controller memproses data.
4. Model berinteraksi dengan database.
5. Response JSON dikirim kembali ke frontend.
6. Vue.js menampilkan data kepada pengguna.

### Hasil Integrasi

Integrasi berhasil dilakukan sehingga seluruh fitur CRUD dapat berjalan dengan baik.

---

# 🚀 BAB 9 – Implementasi Praktikum 14 (Project Akhir Portal Artikel)

Praktikum terakhir merupakan tahap penyempurnaan seluruh materi yang telah dipelajari menjadi sebuah aplikasi Portal Artikel yang utuh.

### Fitur Utama

#### Login

Digunakan untuk membatasi akses ke halaman administrasi.

#### Dashboard

Menampilkan ringkasan informasi sistem.

#### Manajemen Artikel

Fitur yang tersedia:

* Menampilkan artikel
* Menambah artikel
* Mengubah artikel
* Menghapus artikel

#### Manajemen Kategori

Fitur yang tersedia:

* Menampilkan kategori
* Menambah kategori
* Mengubah kategori
* Menghapus kategori

#### REST API

Seluruh data dikelola melalui REST API sehingga frontend dan backend dapat bekerja secara independen.

#### Single Page Application

Navigasi dilakukan tanpa reload halaman sehingga pengalaman pengguna menjadi lebih baik.

---

# 📊 BAB 10 – Pengujian Sistem

### Pengujian Login

| Skenario                      | Hasil            |
| ----------------------------- | ---------------- |
| Login dengan data valid       | Berhasil         |
| Login dengan data tidak valid | Berhasil ditolak |

### Pengujian Artikel

| Skenario          | Hasil    |
| ----------------- | -------- |
| Tambah artikel    | Berhasil |
| Ubah artikel      | Berhasil |
| Hapus artikel     | Berhasil |
| Tampilkan artikel | Berhasil |

### Pengujian Kategori

| Skenario           | Hasil    |
| ------------------ | -------- |
| Tambah kategori    | Berhasil |
| Ubah kategori      | Berhasil |
| Hapus kategori     | Berhasil |
| Tampilkan kategori | Berhasil |

### Pengujian API

| Endpoint | Status   |
| -------- | -------- |
| Login    | Berhasil |
| Artikel  | Berhasil |
| Kategori | Berhasil |

---

# 📝 BAB 11 – Kesimpulan

Melalui rangkaian Praktikum Pemrograman Web 2, telah berhasil dikembangkan sebuah aplikasi Portal Artikel berbasis web yang memanfaatkan teknologi modern seperti Vue.js, CodeIgniter 4, REST API, dan MySQL.

Setiap praktikum memberikan kontribusi terhadap pengembangan sistem, dimulai dari pemahaman dasar HTML dan CSS, pengelolaan data menggunakan PHP dan MySQL, implementasi pola MVC, penggunaan Vue.js untuk membangun Single Page Application, hingga integrasi frontend dan backend menggunakan REST API.

Hasil akhir menunjukkan bahwa aplikasi mampu menjalankan proses autentikasi pengguna, pengelolaan artikel, pengelolaan kategori, serta komunikasi data secara real-time antara frontend dan backend. Selain memenuhi tujuan pembelajaran mata kuliah Pemrograman Web 2, proyek ini juga memberikan pengalaman praktis dalam membangun aplikasi web modern yang terstruktur dan mudah dikembangkan di masa mendatang.

