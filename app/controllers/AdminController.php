<?php

class AdminController extends Controller {

    public function __construct() {
        if (!Session::get('user_id')) {
            header('Location: ' . BASE_URL . 'auth/login');
            exit;
        }
    }

public function index() {
        $data['title'] = 'Dashboard Admin';

        $data['total_admin'] = $this->model('User')->countAdmins();

        $data['total_fasilitas'] = $this->model('FasilitasModel')->countAll();

        $data['total_galeri'] = $this->model('GaleriModel')->countAll();

        $data['total_anggota'] = $this->model('TeamModel')->countAll(); 

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
            return false; 
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

            if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
                Session::setFlash('danger', 'Semua kolom harus diisi!');
                header('Location: ' . BASE_URL . 'admin/changePassword');
                exit;
            }

            if ($new_password !== $confirm_password) {
                Session::setFlash('danger', 'Password baru dan konfirmasi tidak cocok!');
                header('Location: ' . BASE_URL . 'admin/changePassword');
                exit;
            }

            $userModel = $this->model('User');
            $currentUser = $userModel->getUserById($user_id);

            if (!password_verify($current_password, $currentUser['password'])) {
                Session::setFlash('danger', 'Password lama salah!');
                header('Location: ' . BASE_URL . 'admin/changePassword');
                exit;
            }

            if ($userModel->changePassword($user_id, $new_password)) {
                Session::setFlash('success', 'Password berhasil diubah!');
                header('Location: ' . BASE_URL . 'admin/changePassword');
            } else {
                Session::setFlash('danger', 'Terjadi kesalahan sistem.');
                header('Location: ' . BASE_URL . 'admin/changePassword');
            }
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

    public function fasilitas() {
        $data['title'] = 'Manajemen Fasilitas';
        $data['fasilitas'] = $this->model('FasilitasModel')->getAllFasilitas();
        
        $this->view('admin/template/header', $data);
        $this->view('admin/fasilitas/index', $data);
        $this->view('admin/template/footer');
    }

    public function tambahFasilitas() {
        $data['title'] = 'Tambah Fasilitas';
        
        $this->view('admin/template/header', $data);
        $this->view('admin/fasilitas/create', $data);
        $this->view('admin/template/footer');
    }

    public function simpanFasilitas() {
        if ($this->model('FasilitasModel')->tambahFasilitas($_POST)) {
            Session::setFlash('success', 'Fasilitas berhasil ditambahkan!');
            header('Location: ' . BASE_URL . 'admin/fasilitas');
            exit;
        }
    }

    public function editFasilitas($id) {
        $data['title'] = 'Edit Fasilitas';
        $data['fasilitas'] = $this->model('FasilitasModel')->getFasilitasById($id);
        
        $this->view('admin/template/header', $data);
        $this->view('admin/fasilitas/edit', $data);
        $this->view('admin/template/footer');
    }

    public function updateFasilitas() {
        if ($this->model('FasilitasModel')->updateFasilitas($_POST)) {
            Session::setFlash('success', 'Fasilitas berhasil diperbarui!');
            header('Location: ' . BASE_URL . 'admin/fasilitas');
            exit;
        }
    }

    public function hapusFasilitas($id) {
        if ($this->model('FasilitasModel')->hapusFasilitas($id)) {
            Session::setFlash('success', 'Fasilitas berhasil dihapus!');
            header('Location: ' . BASE_URL . 'admin/fasilitas');
            exit;
        }
    }

    // ==========================================================
    // MODULE: ANGGOTA LAB (TEAM)
    // ==========================================================
    public function team() {
        $data['title'] = 'Manajemen Anggota Lab';
        $data['team'] = $this->model('TeamModel')->getAllTeam();
        
        $this->view('admin/template/header', $data);
        $this->view('admin/team/index', $data);
        $this->view('admin/template/footer');
    }

    public function tambahTeam() {
        $data['title'] = 'Tambah Anggota Lab';
        
        $this->view('admin/template/header', $data);
        $this->view('admin/team/create', $data);
        $this->view('admin/template/footer');
    }

    public function simpanTeam() {
        $namaGambar = $this->uploadTeamImage();

        if ($namaGambar === false) {
            return; 
        }

        $_POST['gambar'] = $namaGambar;

        if ($this->model('TeamModel')->tambahTeam($_POST)) {
            Session::setFlash('success', 'Anggota berhasil ditambahkan!');
            header('Location: ' . BASE_URL . 'admin/team');
            exit;
        }
    }

    public function editTeam($id) {
        $data['title'] = 'Edit Anggota Lab';
        $data['member'] = $this->model('TeamModel')->getTeamById($id);
        
        $this->view('admin/template/header', $data);
        $this->view('admin/team/edit', $data);
        $this->view('admin/template/footer');
    }

    public function updateTeam() {
        if ($_FILES['gambar']['error'] === 4) {
            $_POST['gambar'] = ''; 
        } else {
            $namaGambar = $this->uploadTeamImage();
            if ($namaGambar === false) {
                return;
            }
            $_POST['gambar'] = $namaGambar;
            
        }

        if ($this->model('TeamModel')->updateTeam($_POST)) {
            Session::setFlash('success', 'Data anggota berhasil diperbarui!');
            header('Location: ' . BASE_URL . 'admin/team');
            exit;
        }
    }

    public function hapusTeam($id) {
        $member = $this->model('TeamModel')->getTeamById($id);
        
        if ($member['gambar'] != 'default.jpg' && !empty($member['gambar'])) {
            $filePath = 'assets/img/team/' . $member['gambar'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        if ($this->model('TeamModel')->hapusTeam($id)) {
            Session::setFlash('success', 'Anggota berhasil dihapus!');
            header('Location: ' . BASE_URL . 'admin/team');
            exit;
        }
    }

    private function uploadTeamImage() {
        $namaFile   = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error      = $_FILES['gambar']['error'];
        $tmpName    = $_FILES['gambar']['tmp_name'];

        if ($error === 4) {
            return 'default.jpg'; 
        }

        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiValid)) {
            Session::setFlash('danger', 'Yang anda upload bukan gambar!');
            echo "<script>history.back()</script>"; 
            return false;
        }

        if ($ukuranFile > 2000000) {
            Session::setFlash('danger', 'Ukuran gambar terlalu besar (Max 2MB)!');
            echo "<script>history.back()</script>";
            return false;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/img/team/' . $namaFileBaru);

        return $namaFileBaru;
    }

    // ==========================================================
    // MODULE: PUBLIKASI JURNAL
    // ==========================================================
    public function publikasi() {
        $data['title'] = 'Manajemen Publikasi';
        $data['publikasi'] = $this->model('PublikasiModel')->getAllPublikasi();
        
        $this->view('admin/template/header', $data);
        $this->view('admin/publikasi/index', $data);
        $this->view('admin/template/footer');
    }

    public function tambahPublikasi() {
        $data['title'] = 'Tambah Publikasi';
        
        $this->view('admin/template/header', $data);
        $this->view('admin/publikasi/create', $data);
        $this->view('admin/template/footer');
    }

    public function simpanPublikasi() {
        if ($this->model('PublikasiModel')->tambahPublikasi($_POST)) {
            Session::setFlash('success', 'Publikasi berhasil ditambahkan!');
            header('Location: ' . BASE_URL . 'admin/publikasi');
            exit;
        }
    }

    public function editPublikasi($id) {
        $data['title'] = 'Edit Publikasi';
        $data['p'] = $this->model('PublikasiModel')->getPublikasiById($id);
        
        $this->view('admin/template/header', $data);
        $this->view('admin/publikasi/edit', $data);
        $this->view('admin/template/footer');
    }

    public function updatePublikasi() {
        if ($this->model('PublikasiModel')->updatePublikasi($_POST)) {
            Session::setFlash('success', 'Publikasi berhasil diperbarui!');
            header('Location: ' . BASE_URL . 'admin/publikasi');
            exit;
        }
    }

    public function hapusPublikasi($id) {
        if ($this->model('PublikasiModel')->hapusPublikasi($id)) {
            Session::setFlash('success', 'Publikasi berhasil dihapus!');
            header('Location: ' . BASE_URL . 'admin/publikasi');
            exit;
        }
    }

    // ==========================================================
    // MODULE: MATA KULIAH
    // ==========================================================
    public function matakuliah() {
        $data['title'] = 'Mata Kuliah Terkait';
        $data['matkul'] = $this->model('MatkulModel')->getAllMatkul();
        
        $this->view('admin/template/header', $data);
        $this->view('admin/matakuliah/index', $data);
        $this->view('admin/template/footer');
    }

    public function tambahMatkul() {
        $data['title'] = 'Tambah Mata Kuliah Terkait';
        
        $this->view('admin/template/header', $data);
        $this->view('admin/matakuliah/create', $data);
        $this->view('admin/template/footer');
    }

    public function simpanMatkul() {
        if ($this->model('MatkulModel')->tambahMatkul($_POST)) {
            Session::setFlash('success', 'Mata kuliah berhasil ditambahkan!');
            header('Location: ' . BASE_URL . 'admin/matakuliah');
            exit;
        }
    }

    public function editMatkul($id) {
        $data['title'] = 'Edit Mata Kuliah Terkait';
        $data['mk'] = $this->model('MatkulModel')->getMatkulById($id);
        
        $this->view('admin/template/header', $data);
        $this->view('admin/matakuliah/edit', $data);
        $this->view('admin/template/footer');
    }

    public function updateMatkul() {
        if ($this->model('MatkulModel')->updateMatkul($_POST)) {
            Session::setFlash('success', 'Mata kuliah berhasil diperbarui!');
            header('Location: ' . BASE_URL . 'admin/matakuliah');
            exit;
        }
    }

    public function hapusMatkul($id) {
        if ($this->model('MatkulModel')->hapusMatkul($id)) {
            Session::setFlash('success', 'Mata kuliah berhasil dihapus!');
            header('Location: ' . BASE_URL . 'admin/matakuliah');
            exit;
        }
    }

    // ==========================================================
    // MODULE: GALERI
    // ==========================================================
    public function galeri() {
        $data['title'] = 'Manajemen Galeri';
        $data['galeri'] = $this->model('GaleriModel')->getAllGaleri();
        
        $this->view('admin/template/header', $data);
        $this->view('admin/galeri/index', $data);
        $this->view('admin/template/footer');
    }

    public function tambahGaleri() {
        $data['title'] = 'Tambah Galeri';
        
        $this->view('admin/template/header', $data);
        $this->view('admin/galeri/create', $data);
        $this->view('admin/template/footer');
    }

    public function simpanGaleri() {
        $namaFile = $this->uploadGaleriImage();
        if (!$namaFile) {
            return false; 
        }

        $_POST['file_path'] = $namaFile;

        if ($this->model('GaleriModel')->tambahGaleri($_POST)) {
            Session::setFlash('success', 'Foto berhasil ditambahkan ke galeri!');
            header('Location: ' . BASE_URL . 'admin/galeri');
            exit;
        }
    }

    public function editGaleri($id) {
        $data['title'] = 'Edit Galeri';
        $data['g'] = $this->model('GaleriModel')->getGaleriById($id);
        
        $this->view('admin/template/header', $data);
        $this->view('admin/galeri/edit', $data);
        $this->view('admin/template/footer');
    }

    public function updateGaleri() {
        $namaFile = $_FILES['gambar']['name'];
        
        if ($namaFile != '') {
            $gambarBaru = $this->uploadGaleriImage();
            $_POST['file_path'] = $gambarBaru;
        } else {
            $_POST['file_path'] = ''; 
        }

        if ($this->model('GaleriModel')->updateGaleri($_POST)) {
            Session::setFlash('success', 'Galeri berhasil diperbarui!');
            header('Location: ' . BASE_URL . 'admin/galeri');
            exit;
        }
    }

    public function hapusGaleri($id) {
        $galeri = $this->model('GaleriModel')->getGaleriById($id);
        $filePath = 'assets/img/gallery/' . $galeri['file_path'];
        
        if (file_exists($filePath) && !empty($galeri['file_path'])) {
            unlink($filePath); 
        }

        if ($this->model('GaleriModel')->hapusGaleri($id)) {
            Session::setFlash('success', 'Foto berhasil dihapus!');
            header('Location: ' . BASE_URL . 'admin/galeri');
            exit;
        }
    }

    private function uploadGaleriImage() {
        $namaFile   = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error      = $_FILES['gambar']['error'];
        $tmpName    = $_FILES['gambar']['tmp_name'];

        if ($error === 4) {
            Session::setFlash('danger', 'Pilih gambar terlebih dahulu!');
            header('Location: ' . BASE_URL . 'admin/tambahGaleri');
            exit;
        }

        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiValid)) {
            Session::setFlash('danger', 'Yang anda upload bukan gambar valid (jpg/png)!');
            header('Location: ' . BASE_URL . 'admin/tambahGaleri');
            exit;
        }

        if ($ukuranFile > 2000000) {
            Session::setFlash('danger', 'Ukuran gambar terlalu besar (Max 2MB)!');
            header('Location: ' . BASE_URL . 'admin/tambahGaleri');
            exit;
        }

        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        if (!file_exists('assets/img/gallery')) {
            mkdir('assets/img/gallery', 0777, true);
        }

        move_uploaded_file($tmpName, 'assets/img/gallery/' . $namaFileBaru);

        return $namaFileBaru;
    }
}