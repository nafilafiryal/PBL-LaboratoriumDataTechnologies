<?php

class Database {
    private static $conn;

    // Inisialisasi koneksi PostgreSQL
    public static function connect() {
        if (!self::$conn) {
            // String koneksi standar PostgreSQL
            // Pastikan port default 5432 atau sesuaikan jika berbeda
            $connection_string = "host=" . DB_HOST . " port=5433 dbname=" . DB_NAME . " user=" . DB_USER . " password=" . DB_PASS;
            
            self::$conn = pg_connect($connection_string);
            
            if (!self::$conn) {
                die("Koneksi Database Gagal: Tidak dapat terhubung ke PostgreSQL.");
            }
        }
        return self::$conn;
    }

    // Eksekusi Query
    public static function query($sql) {
        self::connect();
        $result = pg_query(self::$conn, $sql);
        
        if (!$result) {
            die("Query Error: " . pg_last_error(self::$conn) . " <br> Query: " . $sql);
        }
        
        return $result;
    }

    // Escape string untuk keamanan (Mencegah SQL Injection)
    public static function escape($str) {
        self::connect();
        return pg_escape_string(self::$conn, $str);
    }

    // Menghitung jumlah baris
    public static function numRows($result) {
        return pg_num_rows($result);
    }

    // Mengambil data sebagai array associative
    public static function fetchAssoc($result) {
        return pg_fetch_assoc($result);
    }

    // Mengambil ID terakhir (Catatan: PostgreSQL butuh 'RETURNING id' di query INSERT agar akurat)
    public static function insertId() {
        // Fungsi ini mungkin tidak bekerja otomatis seperti di MySQL
        // Sebaiknya tambahkan "RETURNING id" pada query INSERT Anda
        return null; 
    }
}