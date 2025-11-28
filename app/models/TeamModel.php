<?php

class TeamModel {
    private $table = 'lab_members';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllTeam() {
        $sql = "SELECT * FROM " . $this->table . " ORDER BY id ASC";
        $result = Database::query($sql);
        
        $data = [];
        while ($row = Database::fetchAssoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function getTeamById($id) {
        $id = (int)$id;
        $sql = "SELECT * FROM " . $this->table . " WHERE id = $id";
        $result = Database::query($sql);
        return Database::fetchAssoc($result);
    }

    public function tambahTeam($data) {
        $nama   = Database::escape($data['nama']);
        $posisi = Database::escape($data['posisi']);
        $nip    = Database::escape($data['nip']);
        $kontak = Database::escape($data['kontak']);
        $gambar = Database::escape($data['gambar']); 
        
        $query = "INSERT INTO " . $this->table . " 
                  (nama, posisi, nip, kontak, gambar, created_at) 
                  VALUES ('$nama', '$posisi', '$nip', '$kontak', '$gambar', NOW())";
        
        return Database::query($query);
    }

    public function updateTeam($data) {
        $id     = (int)$data['id'];
        $nama   = Database::escape($data['nama']);
        $posisi = Database::escape($data['posisi']);
        $nip    = Database::escape($data['nip']);
        $kontak = Database::escape($data['kontak']);
        
        $query = "UPDATE " . $this->table . " SET 
                  nama = '$nama', 
                  posisi = '$posisi', 
                  nip = '$nip', 
                  kontak = '$kontak',
                  updated_at = NOW()";


        if (!empty($data['gambar'])) {
            $gambar = Database::escape($data['gambar']);
            $query .= ", gambar = '$gambar'";
        }
        
        $query .= " WHERE id = $id";
        
        return Database::query($query);
    }

    public function hapusTeam($id) {
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