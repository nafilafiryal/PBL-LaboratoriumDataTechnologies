<?php

class BeritaModel {
    private $table = 'berita';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllBerita() {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY created_at DESC');
        return $this->db->resultSet();
    }

    public function getBeritaById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_berita = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function tambahBerita($data) {
        $query = "INSERT INTO " . $this->table . " 
                  (judul, slug, konten, gambar, tanggal_publikasi) 
                  VALUES (:judul, :slug, :konten, :gambar, :tanggal)";
        
        $this->db->query($query);
        $this->db->bind(':judul', $data['judul']);
        $this->db->bind(':slug', $this->slugify($data['judul']));
        $this->db->bind(':konten', $data['konten']);
        $this->db->bind(':gambar', $data['gambar']);
        $this->db->bind(':tanggal', date('Y-m-d')); // Set tanggal hari ini
        
        return $this->db->execute();
    }

    public function updateBerita($data) {
        $query = "UPDATE " . $this->table . " SET 
                  judul = :judul, 
                  konten = :konten";
        
        
        if (!empty($data['gambar'])) {
            $query .= ", gambar = :gambar";
        }
        
        $query .= " WHERE id_berita = :id";

        $this->db->query($query);
        $this->db->bind(':id', $data['id_berita']);
        $this->db->bind(':judul', $data['judul']);
        $this->db->bind(':konten', $data['konten']);
        
        if (!empty($data['gambar'])) {
            $this->db->bind(':gambar', $data['gambar']);
        }
        
        return $this->db->execute();
    }

    public function hapusBerita($id) {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_berita = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    // Helper untuk membuat URL slug
    private function slugify($text) {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
    }
}