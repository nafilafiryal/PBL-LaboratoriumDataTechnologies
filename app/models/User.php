<?php
class User extends Model {
    
    public function login($username, $password) {
        $username = Database::escape($username);
        
        // Query untuk mencari user berdasarkan username atau email
        $sql = "SELECT * FROM users 
                WHERE (username = '$username' OR email = '$username') 
                LIMIT 1";
        
        $result = Database::query($sql);
        
        if (Database::numRows($result) > 0) {
            $user = Database::fetchAssoc($result);
            
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        
        return false;
    }
    
    public function getUserById($id) {
        $id = (int) $id;
        $sql = "SELECT * FROM users WHERE id = $id LIMIT 1";
        $result = Database::query($sql);
        
        if (Database::numRows($result) > 0) {
            return Database::fetchAssoc($result);
        }
        
        return null;
    }
    
    public function getAllUsers() {
        $sql = "SELECT id, username, email, level, nama, created_at 
                FROM users 
                ORDER BY id DESC";
        
        $result = Database::query($sql);
        $users = [];
        
        while ($row = Database::fetchAssoc($result)) {
            $users[] = $row;
        }
        
        return $users;
    }
    
    public function createUser($data) {
        $username = Database::escape($data['username']);
        $email = Database::escape($data['email']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $level = Database::escape($data['level']);
        $nama = Database::escape($data['nama'] ?? '');
        
        $sql = "INSERT INTO users (username, email, password, level, nama, created_at) 
                VALUES ('$username', '$email', '$password', '$level', '$nama', NOW())";
        
        return Database::query($sql);
    }
    
    public function updateUser($id, $data) {
        $id = (int) $id;
        $username = Database::escape($data['username']);
        $email = Database::escape($data['email']);
        $level = Database::escape($data['level']);
        $nama = Database::escape($data['nama'] ?? '');
        
        $sql = "UPDATE users 
                SET username = '$username', 
                    email = '$email', 
                    level = '$level', 
                    nama = '$nama', 
                    updated_at = NOW() 
                WHERE id = $id";
        
        return Database::query($sql);
    }
    
    public function deleteUser($id) {
        $id = (int) $id;
        $sql = "DELETE FROM users WHERE id = $id";
        return Database::query($sql);
    }
    
    public function changePassword($userId, $newPassword) {
        $userId = (int) $userId;
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
        $sql = "UPDATE users 
                SET password = '$hashedPassword', 
                    updated_at = NOW() 
                WHERE id = $userId";
        
        return Database::query($sql);
    }
}