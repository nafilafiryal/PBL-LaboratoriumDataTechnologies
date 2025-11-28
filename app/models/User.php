<?php
class User extends Model {
    
    public function login($username, $password) {
        $username = Database::escape($username);
        
        // Ubah query agar mengambil kolom yang benar
        $sql = "SELECT * FROM users 
                WHERE (username = '$username' OR email = '$username') 
                LIMIT 1";
        
        $result = Database::query($sql);
        
        if (Database::numRows($result) > 0) {
            $user = Database::fetchAssoc($result);
            
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // NORMALISASI DATA: Ubah nama kolom DB ke nama yang dipakai Session
                // Agar Controller tidak error saat panggil $user['id']
                $data_user = [
                    'id' => $user['iduser'],        // iduser -> id
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                    'level' => $user['role'],       // role -> level
                    'nama' => $user['nama_lengkap'] // nama_lengkap -> nama
                ];
                return $data_user;
            }
        }
        
        return false;
    }
    
    public function getUserById($id) {
        $id = (int) $id;
        // Sesuaikan 'id' menjadi 'iduser'
        $sql = "SELECT * FROM users WHERE iduser = $id LIMIT 1";
        $result = Database::query($sql);
        
        if (Database::numRows($result) > 0) {
            $user = Database::fetchAssoc($result);
            // Normalisasi lagi jika perlu
             return [
                'id' => $user['iduser'],
                'username' => $user['username'],
                'password' => $user['password'],
                'email' => $user['email'],
                'level' => $user['role'],
                'nama' => $user['nama_lengkap']
            ];
        }
        
        return null;
    }

    public function changePassword($userId, $newPassword) {
        $userId = (int) $userId;
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
        // Sesuaikan 'id' menjadi 'iduser'
        $sql = "UPDATE users 
                SET password = '$hashedPassword', 
                    updated_at = NOW() 
                WHERE iduser = $userId";
        
        return Database::query($sql);
    }

    public function countAdmins() {
        $sql = "SELECT COUNT(*) as total FROM users WHERE role = 'admin'";
        
        $result = Database::query($sql);
        $row = Database::fetchAssoc($result);
        return $row['total'];
    }

}