<?php

class AdminController extends Controller {

    public function index() {
        $data['title'] = 'Dashboard Admin';
        $this->view('admin/template/header', $data);
        $this->view('admin/template/home', $data);
        $this->view('admin/template/footer');
    }

    
    public function profil() {
        $data['title'] = 'Kelola Profil Lab';
        $data['profil'] = $this->model('ProfilModel')->getProfil();
        
        $this->view('admin/template/header', $data);
        $this->view('admin/profil/index', $data);
        $this->view('admin/template/footer');
    }

    public function updateProfil() {
        if ($this->model('ProfilModel')->updateProfil($_POST) > 0) {
            
            header('Location: ' . BASE_URL . 'admin/profil');
            exit;
        } else {
            header('Location: ' . BASE_URL . 'admin/profil');
            exit;
        }
    }

    
    public function berita() {
        $data['title'] = 'Daftar Berita';
        $data['berita'] = $this->model('BeritaModel')->getAllBerita();
        
        $this->view('admin/template/header', $data);
        $this->view('admin/berita/index', $data);
        $this->view('admin/template/footer');
    }

    public function tambahBerita() {
        $data['title'] = 'Tambah Berita';
        
        $this->view('admin/template/header', $data);
        $this->view('admin/berita/create', $data);
        $this->view('admin/template/footer');
    }

    public function simpanBerita() {
        
        $namaGambar = $this->uploadGambar();
        if (!$namaGambar) {
            return false; 
        }
        
        $_POST['gambar'] = $namaGambar;

        if ($this->model('BeritaModel')->tambahBerita($_POST) > 0) {
            header('Location: ' . BASE_URL . 'admin/berita');
            exit;
        }
    }

    public function editBerita($id) {
        $data['title'] = 'Edit Berita';
        $data['berita'] = $this->model('BeritaModel')->getBeritaById($id);
        
        $this->view('admin/template/header', $data);
        $this->view('admin/berita/edit', $data);
        $this->view('admin/template/footer');
    }

    public function updateBerita() {
        $namaGambar = $_FILES['gambar']['name'];
        
        
        if ($namaGambar != '') {
            $gambarBaru = $this->uploadGambar();
            $_POST['gambar'] = $gambarBaru;
        } else {
            $_POST['gambar'] = ''; 
        }

        if ($this->model('BeritaModel')->updateBerita($_POST) >= 0) {
            header('Location: ' . BASE_URL . 'admin/berita');
            exit;
        }
    }

    public function hapusBerita($id) {
        if ($this->model('BeritaModel')->hapusBerita($id) > 0) {
            header('Location: ' . BASE_URL . 'admin/berita');
            exit;
        }
    }

    
    private function uploadGambar() {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        
        if ($error === 4) {
            return 'default.jpg';
        }

        
        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiValid)) {
            echo "<script>alert('Yang anda upload bukan gambar!');</script>";
            return false;
        }

        
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        
        move_uploaded_file($tmpName, 'assets/img/berita/' . $namaFileBaru);

        return $namaFileBaru;
    }
}