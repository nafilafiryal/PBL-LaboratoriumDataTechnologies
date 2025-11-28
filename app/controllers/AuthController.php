<?php
class AuthController extends Controller {
    
    public function __construct() {
        // Jika sudah login dan bukan logout, redirect ke admin
        $currentUrl = $_GET['url'] ?? '';
        
        // Kecualikan halaman changePassword dari redirect otomatis
        if (Session::isLoggedIn() && $currentUrl !== 'auth/logout' && $currentUrl !== 'auth/changePassword') {
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
    }
    
    public function login() {
        $data = [
            'title' => 'Login - ' . APP_NAME
        ];
        
        $this->view('auth/login', $data);
    }
    
    public function processLogin() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }
        
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');
        
        if (empty($username) || empty($password)) {
            Session::setFlash('error', 'Username dan password harus diisi!');
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }
        
        $userModel = $this->model('User');
        $user = $userModel->login($username, $password);
        
        if ($user) {
            // Set session
            Session::set('user_id', $user['id']);
            Session::set('username', $user['username']);
            Session::set('email', $user['email']);
            Session::set('level', $user['level']);
            Session::set('nama', $user['nama'] ?? $user['username']);
            Session::set('login_time', time());
            
            Session::setFlash('success', 'Login berhasil! Selamat datang, ' . $user['username']);
            
            // Redirect ke admin
            header('Location: ' . BASE_URL . 'admin');
            exit;
        } else {
            Session::setFlash('error', 'Username atau password salah!');
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }
    }
    
    // === FITUR BARU: GANTI PASSWORD DARI LUAR ===
    public function changePassword() {
        $data = [
            'title' => 'Ganti Password - ' . APP_NAME
        ];
        $this->view('auth/change_password', $data);
    }

    public function processChangePassword() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'auth/changePassword');
            exit;
        }

        $username = trim($_POST['username'] ?? '');
        $old_password = trim($_POST['old_password'] ?? '');
        $new_password = trim($_POST['new_password'] ?? '');
        $confirm_password = trim($_POST['confirm_password'] ?? '');

        // 1. Validasi Input
        if (empty($username) || empty($old_password) || empty($new_password) || empty($confirm_password)) {
            Session::setFlash('error', 'Semua kolom harus diisi!');
            header('Location: ' . BASE_URL . 'auth/changePassword');
            exit;
        }

        if ($new_password !== $confirm_password) {
            Session::setFlash('error', 'Password baru dan konfirmasi tidak cocok!');
            header('Location: ' . BASE_URL . 'auth/changePassword');
            exit;
        }

        $userModel = $this->model('User');
        
        // 2. Cek apakah Username & Password Lama BENAR? (Pakai fungsi login yg sdh ada)
        $user = $userModel->login($username, $old_password);

        if ($user) {
            // 3. Jika Benar, Update ke Password Baru
            if ($userModel->changePassword($user['id'], $new_password)) {
                Session::setFlash('success', 'Password berhasil diubah! Silakan login dengan password baru.');
                header('Location: ' . BASE_URL . 'auth/login');
                exit;
            } else {
                Session::setFlash('error', 'Terjadi kesalahan sistem saat mengubah password.');
                header('Location: ' . BASE_URL . 'auth/changePassword');
                exit;
            }
        } else {
            Session::setFlash('error', 'Username atau Password Lama salah!');
            header('Location: ' . BASE_URL . 'auth/changePassword');
            exit;
        }
    }

    public function logout() {
        Session::destroy();
        Session::setFlash('success', 'Anda telah berhasil logout!');
        header('Location: ' . BASE_URL . 'auth/login');
        exit;
    }
}