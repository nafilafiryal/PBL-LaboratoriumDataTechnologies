<?php
class Middleware {
    
    public static function auth() {
        if (!Session::isLoggedIn()) {
            Session::setFlash('error', 'Anda harus login terlebih dahulu!');
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }
    }
    
    public static function guest() {
        if (Session::isLoggedIn()) {
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
    }
    
    public static function admin() {
        self::auth();
        
        if (Session::get('level') !== LEVEL_ADMIN) {
            Session::setFlash('error', 'Anda tidak memiliki akses ke halaman ini!');
            header('Location: ' . BASE_URL);
            exit;
        }
    }
    
    public static function checkTimeout() {
        if (Session::isLoggedIn()) {
            $loginTime = Session::get('login_time');
            $currentTime = time();
            
            if (($currentTime - $loginTime) > SESSION_TIMEOUT) {
                Session::setFlash('error', 'Session Anda telah berakhir. Silakan login kembali.');
                Session::destroy();
                header('Location: ' . BASE_URL . 'auth/login');
                exit;
            }
            
            // Update login time
            Session::set('login_time', $currentTime);
        }
    }
}