<?php

class GaleriModel {
    private $table = 'galleries'; 
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function countAll() {
        $sql = "SELECT COUNT(*) as total FROM " . $this->table;
        $result = Database::query($sql);
        $row = Database::fetchAssoc($result);
        return $row['total'];
    }
}