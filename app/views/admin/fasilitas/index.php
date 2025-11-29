<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Manajemen Fasilitas</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item active">Fasilitas</li>
        </ol>
    </nav>
</div>

<section class="section mt-4">
    <div class="row">
        <div class="col-lg-12">
            
            <div class="card shadow-sm border-0" style="border-top: 4px solid #1a4d80 !important; border-radius: 8px;">
                <div class="card-body p-4">
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="m-0 fw-bold text-primary" style="font-family: 'Nunito', sans-serif; color: #1a4d80 !important;">
                                <i class="bi bi-hdd-network me-2"></i> Daftar Fasilitas & Layanan
                            </h5>
                            <p class="text-muted small m-0 ps-4">Kelola sarana dan prasarana laboratorium</p>
                        </div>
                        <a href="<?= BASE_URL ?>admin/tambahFasilitas" class="btn btn-primary rounded-pill px-4 shadow-sm" style="background-color: #1a4d80; border-color: #1a4d80;">
                            <i class="bi bi-plus-lg me-1"></i> Tambah Fasilitas
                        </a>
                    </div>

                    <?php 
                    $flash = Session::getFlash();
                    if ($flash): 
                    ?>
                        <div class="alert alert-<?= ($flash['type'] == 'success') ? 'success' : 'danger' ?> alert-dismissible fade show shadow-sm mb-4" role="alert">
                            <i class="bi <?= ($flash['type'] == 'success') ? 'bi-check-circle' : 'bi-exclamation-triangle' ?> me-1"></i>
                            <?= $flash['message'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <div class="row g-4">
                        <?php if (empty($data['fasilitas'])): ?>
                            <div class="col-12">
                                <div class="text-center py-5 text-muted bg-light rounded border border-dashed">
                                    <div style="font-size: 3rem; opacity: 0.3;">
                                        <i class="bi bi-building-slash"></i>
                                    </div>
                                    <h6 class="mt-3">Belum ada data fasilitas.</h6>
                                    <p class="small mb-0">Silakan tambahkan fasilitas baru.</p>
                                </div>
                            </div>
                        <?php else: ?>
                            <?php foreach ($data['fasilitas'] as $f) : ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card h-100 shadow-sm border facility-card bg-light">
                                        <div class="card-body p-4 d-flex flex-column">
                                            
                                            <div class="d-flex align-items-start mb-3">
                                                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 mt-1 shadow-sm" 
                                                     style="width: 45px; height: 45px; background-color: white; color: #1a4d80;">
                                                    <i class="bi bi-hdd-network fs-4"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="card-title p-0 m-0 fw-bold text-dark text-uppercase" style="font-size: 0.95rem; letter-spacing: 0.5px;">
                                                        <?= $f['nama_fasilitas']; ?>
                                                    </h6>
                                                    <span class="badge bg-white text-muted border mt-1 fw-normal">Fasilitas Lab</span>
                                                </div>
                                            </div>

                                            <p class="card-text text-secondary small flex-grow-1 ps-1" style="line-height: 1.6; text-align: justify;">
                                                <?= substr($f['deskripsi'], 0, 150) . (strlen($f['deskripsi']) > 150 ? '...' : ''); ?>
                                            </p>

                                            <div class="pt-3 mt-2 border-top d-flex gap-2">
                                                <a href="<?= BASE_URL; ?>admin/editFasilitas/<?= $f['id']; ?>" class="btn btn-white btn-sm flex-fill text-primary fw-bold border hover-blue shadow-sm">
                                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                                </a>
                                                <a href="<?= BASE_URL; ?>admin/hapusFasilitas/<?= $f['id']; ?>" 
                                                   class="btn btn-white btn-sm flex-fill text-danger fw-bold border hover-red shadow-sm"
                                                   onclick="return confirm('Yakin ingin menghapus fasilitas ini?')">
                                                    <i class="bi bi-trash me-1"></i> Hapus
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Style untuk Inner Card agar kontras dengan Main Card putih */
    .facility-card {
        transition: all 0.3s ease;
        background-color: #f8f9fa; /* Abu-abu sangat muda */
        border: 1px solid #dee2e6 !important;
    }
    .facility-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
        background-color: white;
        border-color: #2b78e4 !important;
    }
    
    .hover-blue:hover {
        background-color: #2b78e4;
        color: white !important;
        border-color: #2b78e4 !important;
    }
    .hover-red:hover {
        background-color: #dc3545;
        color: white !important;
        border-color: #dc3545 !important;
    }
    .btn-white {
        background-color: white;
    }
</style>