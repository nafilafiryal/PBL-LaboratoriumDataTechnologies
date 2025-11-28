<?php

class MatkulModel {
    private $table = 'related_courses'; // Sesuai nama tabel di PostgreSQL
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllMatkul() {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY id ASC";
        $result = Database::query($sql);
        
        $data = [];
        while ($row = Database::fetchAssoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getMatkulById($id) {
        $id = (int)$id;
        $sql = "SELECT * FROM " . $this->table . " WHERE id = $id";
        $result = Database::query($sql);
        return Database::fetchAssoc($result);
    }

    public function tambahMatkul($data) {
        $nama      = Database::escape($data['nama_matkul']);
        $deskripsi = Database::escape($data['deskripsi']);
        
        $query = "INSERT INTO " . $this->table . " 
                  (nama_matkul, deskripsi, created_at) 
                  VALUES ('$nama', '$deskripsi', NOW())";
        
        return Database::query($query);
    }

    public function updateMatkul($data) {
        $id        = (int)$data['id'];
        $nama      = Database::escape($data['nama_matkul']);
        $deskripsi = Database::escape($data['deskripsi']);
        
        $query = "UPDATE " . $this->table . " SET 
                  nama_matkul = '$nama', 
                  deskripsi = '$deskripsi', 
                  updated_at = NOW() 
                  WHERE id = $id";
        
        return Database::query($query);
    }

    public function hapusMatkul($id) {
        $id = (int)$id;
        $query = "DELETE FROM " . $this->table . " WHERE id = $id";
        return Database::query($query);
    }

    public function countAll() {
        $sql = "SELECT COUNT(*) as total FROM " . $this->table;
        $result = Database::query($sql);
        $row = Database::fetchAssoc($result);
        return $row['total'];
    }
}