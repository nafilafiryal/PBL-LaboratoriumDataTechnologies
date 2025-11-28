<?php

class BeritaModel {
    private $table = 'news';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllBerita() {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $result = Database::query($sql);

        $data = [];
        while ($row = Database::fetchAssoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getBeritaById($id) {
        $id = (int)$id; 
        $sql = "SELECT * FROM " . $this->table . " WHERE id = $id";
        $result = Database::query($sql);
        return Database::fetchAssoc($result);
    }

    public function tambahBerita($data) {
        $judul = Database::escape($data['judul']);
        $slug = $this->slugify($data['judul']);
        $isi = Database::escape($data['konten']);
        $gambar = Database::escape($data['gambar']);
        $tanggal = date('Y-m-d H:i:s');

        $query = "INSERT INTO " . $this->table . " 
                  (judul, slug, isi, gambar, tanggal_publish, created_at) 
                  VALUES ('$judul', '$slug', '$isi', '$gambar', '$tanggal', NOW())";
        
        return Database::query($query);
    }

    public function updateBerita($data) {
        $id = (int)$data['id_berita'];
        $judul = Database::escape($data['judul']);
        $isi = Database::escape($data['konten']);
        
        $query = "UPDATE " . $this->table . " SET 
                  judul = '$judul', 
                  isi = '$isi', 
                  updated_at = NOW()";

        if (!empty($data['gambar'])) {
            $gambar = Database::escape($data['gambar']);
            $query .= ", gambar = '$gambar'";
        }
        
        $query .= " WHERE id = $id";

        return Database::query($query);
    }

    public function hapusBerita($id) {
        $id = (int)$id;
        $query = "DELETE FROM " . $this->table . " WHERE id = $id";
        return Database::query($query);
    }

    private function slugify($text) {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
    }
}