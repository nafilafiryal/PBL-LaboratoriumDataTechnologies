<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Dashboard</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<section class="section dashboard mt-0 pt-0">
    
    <div class="row mb-4 mt-2">
        <div class="col-12">
            <div class="card border-0 shadow-sm text-white" style="background-color: #1a4d80; border-radius: 10px; overflow: hidden; position: relative;">
                
                <div style="position: absolute; top: -50%; right: -10%; width: 300px; height: 300px; background: rgba(255,255,255,0.1); border-radius: 50%; pointer-events: none;"></div>
                
                <div class="card-body p-4 d-flex align-items-center justify-content-between position-relative" style="z-index: 2;">
                    <div>
                        <h3 class="fw-bold mb-2 text-white" style="font-family: sans-serif;">
                            Selamat Datang, <?= Session::get('nama') ?? Session::get('username') ?>!
                        </h3>
                        <p class="mb-0 opacity-75 text-white">
                            Panel Administrasi <strong>Laboratorium Data Teknologi</strong>.
                            <br>Anda login sebagai <span class="badge bg-white text-primary rounded-pill px-3"><?= ucfirst(Session::get('level')) ?></span>
                        </p>
                    </div>
                    <div class="d-none d-md-block opacity-50 text-white">
                        <i class="bi bi-grid-fill" style="font-size: 4rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card shadow-sm h-100 border-0" style="border-left: 5px solid #2b78e4 !important;">
                <div class="card-body">
                    <h5 class="card-title text-muted small text-uppercase fw-bold mb-1">Total Admin</h5>
                    <div class="d-flex align-items-center mt-2">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 50px; height: 50px; background-color: #e6f0ff; color: #2b78e4;">
                            <i class="bi bi-shield-lock-fill fs-4"></i>
                        </div>
                        <div class="ps-3">
                            <h3 class="mb-0 fw-bold" style="color: #1a4d80;"><?= $data['total_admin'] ?? 0 ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-md-6">
            <div class="card info-card shadow-sm h-100 border-0" style="border-left: 5px solid #1a4d80 !important;">
                <div class="card-body">
                    <h5 class="card-title text-muted small text-uppercase fw-bold mb-1">Fasilitas</h5>
                    <div class="d-flex align-items-center mt-2">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 50px; height: 50px; background-color: #e9ecef; color: #1a4d80;">
                            <i class="bi bi-hdd-network fs-4"></i>
                        </div>
                        <div class="ps-3">
                            <h3 class="mb-0 fw-bold" style="color: #1a4d80;"><?= $data['total_fasilitas'] ?? 0 ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-md-6">
            <div class="card info-card shadow-sm h-100 border-0" style="border-left: 5px solid #2b78e4 !important;">
                <div class="card-body">
                    <h5 class="card-title text-muted small text-uppercase fw-bold mb-1">Total Galeri</h5>
                    <div class="d-flex align-items-center mt-2">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 50px; height: 50px; background-color: #e6f0ff; color: #2b78e4;">
                            <i class="bi bi-images fs-4"></i>
                        </div>
                        <div class="ps-3">
                            <h3 class="mb-0 fw-bold" style="color: #1a4d80;"><?= $data['total_galeri'] ?? 0 ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-md-6">
            <div class="card info-card shadow-sm h-100 border-0" style="border-left: 5px solid #1a4d80 !important;">
                <div class="card-body">
                    <h5 class="card-title text-muted small text-uppercase fw-bold mb-1">Anggota Lab</h5>
                    <div class="d-flex align-items-center mt-2">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 50px; height: 50px; background-color: #e9ecef; color: #1a4d80;">
                            <i class="bi bi-people-fill fs-4"></i>
                        </div>
                        <div class="ps-3">
                            <h3 class="mb-0 fw-bold" style="color: #1a4d80;"><?= $data['total_anggota'] ?? 0 ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3 border-bottom">
                    <h6 class="m-0 fw-bold" style="color: #1a4d80;">Akses Cepat</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-6 col-md-3">
                            <a href="<?= BASE_URL ?>admin/tambahBerita" class="btn btn-outline-custom w-100 py-3 d-flex flex-column align-items-center shadow-sm">
                                <i class="bi bi-newspaper fs-2 mb-2"></i>
                                <span>Tulis Berita</span>
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="<?= BASE_URL ?>admin/tambahGaleri" class="btn btn-outline-custom w-100 py-3 d-flex flex-column align-items-center shadow-sm">
                                <i class="bi bi-cloud-upload fs-2 mb-2"></i>
                                <span>Upload Foto</span>
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="<?= BASE_URL ?>admin/tambahPublikasi" class="btn btn-outline-custom w-100 py-3 d-flex flex-column align-items-center shadow-sm">
                                <i class="bi bi-journal-plus fs-2 mb-2"></i>
                                <span>Input Jurnal</span>
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="<?= BASE_URL ?>admin/profil" class="btn btn-outline-custom w-100 py-3 d-flex flex-column align-items-center shadow-sm">
                                <i class="bi bi-gear fs-2 mb-2"></i>
                                <span>Edit Profil</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<style>
    .card {
        border-radius: 8px;
    }
    .info-card {
        transition: transform 0.3s;
    }
    .info-card:hover {
        transform: translateY(-5px);
    }
    .btn-outline-custom {
        color: #1a4d80;
        border-color: #e0e0e0;
        background: white;
        transition: all 0.3s;
    }
    .btn-outline-custom:hover {
        color: white;
        background-color: #2b78e4;
        border-color: #2b78e4;
    }
    .btn-outline-custom i {
        color: #2b78e4;
    }
    .btn-outline-custom:hover i {
        color: white;
    }
</style>