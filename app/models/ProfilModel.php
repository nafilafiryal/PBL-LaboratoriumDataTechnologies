<?php

class ProfilModel {
    private $table = 'lab_profiles';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getProfil() {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = 1";
        $result = Database::query($sql);
        return Database::fetchAssoc($result);
    }

    public function updateProfil($data) {
        $profil = Database::escape($data['profil']);
        $visi   = Database::escape($data['visi']);
        $misi   = Database::escape($data['misi']);

        $query = "UPDATE " . $this->table . " SET 
                  profil = '$profil', 
                  visi = '$visi', 
                  misi = '$misi',
                  updated_at = NOW()
                  WHERE id = 1";
        
        return Database::query($query);
    }
}