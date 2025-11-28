<?php

class AdminController extends Controller {

    public function __construct() {
        // Cek apakah user sudah login
        if (!Session::get('user_id')) {
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }
    }

    public function index() {
        $data['title'] = 'Dashboard Admin';
        $this->view('admin/template/header', $data);
        $this->view('admin/template/home', $data);
        $this->view('admin/template/footer');
    }

    // ==========================================================
    // MODULE: PROFIL LAB
    // ==========================================================
    public function profil() {
        $data['title'] = 'Kelola Profil Lab';
        $data['profil'] = $this->model('ProfilModel')->getProfil();
        
        $this->view('admin/template/header', $data);
        $this->view('admin/profil/index', $data);
        $this->view('admin/template/footer');
    }

    public function updateProfil() {
        if ($this->model('ProfilModel')->updateProfil($_POST) > 0) {
            Session::setFlash('success', 'Profil berhasil diperbarui!');
            header('Location: ' . BASE_URL . 'admin/profil');
            exit;
        } else {
            // Jika tidak ada perubahan
            Session::setFlash('info', 'Tidak ada data yang diubah.');
            header('Location: ' . BASE_URL . 'admin/profil');
            exit;
        }
    }

    // ==========================================================
    // MODULE: BERITA
    // ==========================================================
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
            return false; // Error handled inside uploadGambar
        }
        
        $_POST['gambar'] = $namaGambar;

        if ($this->model('BeritaModel')->tambahBerita($_POST) > 0) {
            Session::setFlash('success', 'Berita berhasil ditambahkan!');
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
            Session::setFlash('success', 'Berita berhasil diupdate!');
            header('Location: ' . BASE_URL . 'admin/berita');
            exit;
        }
    }

    public function hapusBerita($id) {
        if ($this->model('BeritaModel')->hapusBerita($id) > 0) {
            Session::setFlash('success', 'Berita berhasil dihapus!');
            header('Location: ' . BASE_URL . 'admin/berita');
            exit;
        }
    }

    // ==========================================================
    // MODULE: GANTI PASSWORD (YANG SEBELUMNYA HILANG)
    // ==========================================================
    public function changePassword() {
        $data['title'] = 'Ganti Password';
        
        $this->view('admin/template/header', $data);
        $this->view('admin/password/index', $data);
        $this->view('admin/template/footer');
    }

    public function updatePassword() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $current_password = $_POST['current_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];
            $user_id = Session::get('user_id');

            // 1. Validasi Input Kosong
            if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
                Session::setFlash('danger', 'Semua kolom harus diisi!');
                header('Location: ' . BASE_URL . 'admin/changePassword');
                exit;
            }

            // 2. Cek Password Baru sama dengan Konfirmasi
            if ($new_password !== $confirm_password) {
                Session::setFlash('danger', 'Password baru dan konfirmasi tidak cocok!');
                header('Location: ' . BASE_URL . 'admin/changePassword');
                exit;
            }

            // 3. Ambil Data User untuk Cek Password Lama
            $userModel = $this->model('User');
            $currentUser = $userModel->getUserById($user_id);

            if (!password_verify($current_password, $currentUser['password'])) {
                Session::setFlash('danger', 'Password lama salah!');
                header('Location: ' . BASE_URL . 'admin/changePassword');
                exit;
            }

            // 4. Update Password
            if ($userModel->changePassword($user_id, $new_password)) {
                Session::setFlash('success', 'Password berhasil diubah!');
                header('Location: ' . BASE_URL . 'admin/changePassword');
            } else {
                Session::setFlash('danger', 'Terjadi kesalahan sistem.');
                header('Location: ' . BASE_URL . 'admin/changePassword');
            }
        }
    }

    // Helper Upload Gambar
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