<?php
class Session {
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    public static function set($key, $value) {
        self::start();
        $_SESSION[$key] = $value;
    }
    
    public static function get($key, $default = null) {
        self::start();
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }
    
    public static function has($key) {
        self::start();
        return isset($_SESSION[$key]);
    }
    
    public static function delete($key) {
        self::start();
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
    
    public static function destroy() {
        self::start();
        session_unset();
        session_destroy();
    }
    
    public static function isLoggedIn() {
        return self::has('user_id') && self::has('level');
    }
    
    public static function requireLogin() {
        if (!self::isLoggedIn()) {
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }
    }
    
    public static function requireAdmin() {
        self::requireLogin();
        if (self::get('level') !== LEVEL_ADMIN) {
            header('Location: ' . BASE_URL);
            exit;
        }
    }
    
    public static function setFlash($type, $message) {
        self::set('flash', [
            'type' => $type,
            'message' => $message
        ]);
    }
    
    public static function getFlash() {
        $flash = self::get('flash');
        self::delete('flash');
        return $flash;
    }
}