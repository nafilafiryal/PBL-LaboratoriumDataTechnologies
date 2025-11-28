<?php

class GaleriModel {
    private $table = 'galleries'; 
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllGaleri() {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $result = Database::query($sql);
        
        $data = [];
        while ($row = Database::fetchAssoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getGaleriById($id) {
        $id = (int)$id;
        $sql = "SELECT * FROM " . $this->table . " WHERE id = $id";
        $result = Database::query($sql);
        return Database::fetchAssoc($result);
    }

    public function tambahGaleri($data) {
        $judul = Database::escape($data['judul']);
        $file  = Database::escape($data['file_path']);

        $query = "INSERT INTO " . $this->table . " 
                  (judul, file_path, created_by, created_at) 
                  VALUES ('$judul', '$file', 1, NOW())";
        
        return Database::query($query);
    }

    public function updateGaleri($data) {
        $id    = (int)$data['id'];
        $judul = Database::escape($data['judul']);
        
        $query = "UPDATE " . $this->table . " SET 
                  judul = '$judul', 
                  updated_at = NOW()";

        if (!empty($data['file_path'])) {
            $file = Database::escape($data['file_path']);
            $query .= ", file_path = '$file'";
        }
        
        $query .= " WHERE id = $id";
        
        return Database::query($query);
    }

    public function hapusGaleri($id) {
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