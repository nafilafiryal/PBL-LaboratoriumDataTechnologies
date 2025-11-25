<?php

class ProfilModel {
    private $table = 'profil';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getProfil() {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_profil = 1');
        return $this->db->single();
    }

    public function updateProfil($data) {
        $query = "UPDATE " . $this->table . " SET 
                  sejarah = :sejarah, 
                  visi = :visi, 
                  misi = :misi 
                  WHERE id_profil = 1";
        
        $this->db->query($query);
        $this->db->bind(':sejarah', $data['sejarah']);
        $this->db->bind(':visi', $data['visi']);
        $this->db->bind(':misi', $data['misi']);
        
        return $this->db->execute();
    }
}