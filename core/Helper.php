<?php
class Helper {
    
    public static function redirect($url) {
        header('Location: ' . BASE_URL . $url);
        exit;
    }
    
    public static function back() {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
    
    public static function formatDate($date, $format = 'd-m-Y H:i') {
        return date($format, strtotime($date));
    }
    
    public static function formatCurrency($amount) {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
    
    public static function sanitize($string) {
        return htmlspecialchars(strip_tags($string));
    }
    
    public static function generateToken($length = 32) {
        return bin2hex(random_bytes($length));
    }
    
    public static function uploadFile($file, $destination, $allowedTypes = ['jpg', 'jpeg', 'png', 'gif']) {
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
            return ['success' => false, 'message' => 'Error uploading file'];
        }
        
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        
        if (!in_array($extension, $allowedTypes)) {
            return ['success' => false, 'message' => 'File type not allowed'];
        }
        
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $filepath = $destination . '/' . $filename;
        
        if (move_uploaded_file($file['tmp_name'], $filepath)) {
            return ['success' => true, 'filename' => $filename, 'filepath' => $filepath];
        }
        
        return ['success' => false, 'message' => 'Failed to move uploaded file'];
    }
    
    public static function deleteFile($filepath) {
        if (file_exists($filepath)) {
            return unlink($filepath);
        }
        return false;
    }
}