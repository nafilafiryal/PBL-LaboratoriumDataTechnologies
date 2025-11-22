<?php
class AuthController extends Controller {
    
    public function __construct() {
        // Jika sudah login dan bukan logout, redirect ke admin
        $currentUrl = $_GET['url'] ?? '';
        if (Session::isLoggedIn() && $currentUrl !== 'auth/logout') {
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
    
    public function logout() {
        Session::destroy();
        Session::setFlash('success', 'Anda telah berhasil logout!');
        header('Location: ' . BASE_URL . 'auth/login');
        exit;
    }
}