<?php

class FasilitasModel {
    private $table = 'facilities'; 
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllFasilitas() {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $result = Database::query($sql);
        
        $data = [];
        while ($row = Database::fetchAssoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getFasilitasById($id) {
        $id = (int)$id;
        $sql = "SELECT * FROM " . $this->table . " WHERE id = $id";
        $result = Database::query($sql);
        return Database::fetchAssoc($result);
    }

    public function tambahFasilitas($data) {
        $nama = Database::escape($data['nama_fasilitas']);
        $deskripsi = Database::escape($data['deskripsi']);

        $query = "INSERT INTO " . $this->table . " 
                  (nama_fasilitas, deskripsi, created_by, created_at) 
                  VALUES ('$nama', '$deskripsi', 1, NOW())";
        
        return Database::query($query);
    }

    public function updateFasilitas($data) {
        $id = (int)$data['id'];
        $nama = Database::escape($data['nama_fasilitas']);
        $deskripsi = Database::escape($data['deskripsi']);
        
        $query = "UPDATE " . $this->table . " SET 
                  nama_fasilitas = '$nama', 
                  deskripsi = '$deskripsi', 
                  updated_at = NOW() 
                  WHERE id = $id";
        
        return Database::query($query);
    }

    public function hapusFasilitas($id) {
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