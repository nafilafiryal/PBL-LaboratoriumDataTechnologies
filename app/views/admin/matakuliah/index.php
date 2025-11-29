<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Mata Kuliah Terkait</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item active">Mata Kuliah</li>
        </ol>
    </nav>
</div>

<section class="section mt-4">
    
    <div class="card shadow-sm border-0" style="border-top: 4px solid #1a4d80 !important; border-radius: 8px;">
        <div class="card-body p-4">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="m-0 fw-bold text-primary" style="font-family: 'Nunito', sans-serif; color: #1a4d80 !important;">
                        <i class="bi bi-book-half me-2"></i> Daftar Mata Kuliah
                    </h5>
                    <p class="text-muted small m-0 ps-4">Kurikulum & kompetensi yang relevan dengan lab</p>
                </div>
                <a href="<?= BASE_URL ?>admin/tambahMatkul" class="btn btn-primary rounded-pill px-4 shadow-sm" style="background-color: #1a4d80; border-color: #1a4d80;">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Data
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
                <?php if (empty($data['matkul'])): ?>
                    <div class="col-12">
                        <div class="text-center py-5 text-muted bg-light rounded border border-dashed">
                            <div style="font-size: 3rem; opacity: 0.3;">
                                <i class="bi bi-journal-x"></i>
                            </div>
                            <h6 class="mt-3">Belum ada mata kuliah.</h6>
                            <p class="small mb-0">Silakan tambahkan data baru.</p>
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach ($data['matkul'] as $mk) : ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm border matkul-card bg-white position-relative overflow-hidden">
                                <div class="card-body p-4 d-flex flex-column">
                                    
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" 
                                             style="width: 48px; height: 48px; background: linear-gradient(135deg, #1a4d80, #2b78e4); color: white;">
                                            <i class="bi bi-book fs-4"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="card-title p-0 m-0 fw-bold text-dark" style="font-size: 1rem; line-height: 1.2;">
                                                <?= $mk['nama_matkul']; ?>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="p-3 bg-light rounded mb-3 flex-grow-1 border border-light">
                                        <p class="card-text text-muted small m-0" style="text-align: justify; line-height: 1.6;">
                                            <?= substr($mk['deskripsi'], 0, 120) . (strlen($mk['deskripsi']) > 120 ? '...' : ''); ?>
                                        </p>
                                    </div>

                                    <div class="d-flex gap-2">
                                        <a href="<?= BASE_URL; ?>admin/editMatkul/<?= $mk['id']; ?>" class="btn btn-outline-primary btn-sm flex-fill rounded-pill">
                                            <i class="bi bi-pencil-square me-1"></i> Edit
                                        </a>
                                        <a href="<?= BASE_URL; ?>admin/hapusMatkul/<?= $mk['id']; ?>" 
                                           class="btn btn-outline-danger btn-sm flex-fill rounded-pill"
                                           onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">
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
</section>

<style>
    .matkul-card {
        transition: all 0.3s ease;
        border: 1px solid #eef1f6 !important;
    }
    .matkul-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
        border-color: #2b78e4 !important;
    }
</style>