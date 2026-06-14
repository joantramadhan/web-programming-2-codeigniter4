<?php namespace App\Controllers;

class Auth extends BaseController {
    
    public function index() {
        return view('auth/login_user'); // Halaman pilihan login
    }

    public function loginAdmin() {
        return view('auth/login_admin'); // Halaman login admin
    }

    public function cekLoginAdmin() {
        $model = new \App\Models\AdminModel(); // Buat model Admin dulu ya
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $admin = $model->where(['username' => $username, 'password' => $password])->first();

        if ($admin) {
            session()->set(['isLoggedIn' => true, 'role' => 'admin']);
            return redirect()->to('/admin/dashboard');
        }
        return redirect()->back()->with('error', 'Login Admin Gagal!');
    }

    public function cekLoginUser() {
        // 1. Panggil Model User
        $model = new \App\Models\UserModel(); 
        
        // 2. Ambil data dari form login user
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        // 3. Cari di tabel users yang username & passwordnya cocok
        $user = $model->where(['username' => $username, 'password' => $password])->first();

        if ($user) {
            // 4. Set session dengan role 'user'
            session()->set([
                'isLoggedIn' => true, 
                'role'       => 'user',
                'username'   => $user['username']
            ]);
            
            // 5. Lempar ke halaman artikel (halaman list artikel untuk user)
            return redirect()->to('/artikel');
        }
        
        // 6. Kalau gagal, balikin ke login user dengan pesan error
        return redirect()->back()->with('error', 'Login User Gagal! Periksa kembali username & password.');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }
}