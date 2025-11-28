<?php

class PublikasiModel {
    private $table = 'publications'; // Nama tabel di PostgreSQL
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllPublikasi() {
        // Mengambil data publikasi urut berdasarkan tahun terbaru
        $sql = "SELECT * FROM " . $this->table . " ORDER BY tahun DESC, id DESC";
        $result = Database::query($sql);
        
        $data = [];
        while ($row = Database::fetchAssoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getPublikasiById($id) {
        $id = (int)$id;
        $sql = "SELECT * FROM " . $this->table . " WHERE id = $id";
        $result = Database::query($sql);
        return Database::fetchAssoc($result);
    }

    public function tambahPublikasi($data) {
        $judul = Database::escape($data['judul']);
        $tahun = (int)$data['tahun'];
        $link  = Database::escape($data['link']);
        
        // created_by default 1 (admin)
        $query = "INSERT INTO " . $this->table . " 
                  (judul, tahun, link, created_by, created_at) 
                  VALUES ('$judul', $tahun, '$link', 1, NOW())";
        
        return Database::query($query);
    }

    public function updatePublikasi($data) {
        $id    = (int)$data['id'];
        $judul = Database::escape($data['judul']);
        $tahun = (int)$data['tahun'];
        $link  = Database::escape($data['link']);
        
        $query = "UPDATE " . $this->table . " SET 
                  judul = '$judul', 
                  tahun = $tahun, 
                  link = '$link',
                  updated_at = NOW() 
                  WHERE id = $id";
        
        return Database::query($query);
    }

    public function hapusPublikasi($id) {
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