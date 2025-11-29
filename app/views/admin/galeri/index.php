<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Manajemen Galeri</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item active">Galeri</li>
        </ol>
    </nav>
</div>

<section class="section mt-4">
    
    <div class="card shadow-sm border-0" style="border-top: 4px solid #1a4d80 !important; border-radius: 8px;">
        <div class="card-body p-4">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="m-0 fw-bold text-primary" style="font-family: 'Nunito', sans-serif; color: #1a4d80 !important;">
                        <i class="bi bi-images me-2"></i> Album Kegiatan
                    </h5>
                    <p class="text-muted small m-0 ps-4">Dokumentasi visual aktivitas laboratorium</p>
                </div>
                <a href="<?= BASE_URL ?>admin/tambahGaleri" class="btn btn-primary rounded-pill px-4 shadow-sm" style="background-color: #1a4d80; border-color: #1a4d80;">
                    <i class="bi bi-cloud-upload me-1"></i> Upload Foto
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
                <?php if (empty($data['galeri'])): ?>
                    <div class="col-12">
                        <div class="text-center py-5 text-muted bg-light rounded border border-dashed">
                            <div style="font-size: 3rem; opacity: 0.3;">
                                <i class="bi bi-image"></i>
                            </div>
                            <h6 class="mt-3">Galeri masih kosong.</h6>
                            <p class="small mb-0">Silakan upload foto kegiatan baru.</p>
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach ($data['galeri'] as $g) : ?>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card h-100 shadow-sm border-0 gallery-card overflow-hidden">
                                
                                <div class="position-relative overflow-hidden" style="height: 200px;">
                                    <img src="<?= BASE_URL; ?>assets/img/gallery/<?= $g['file_path']; ?>" 
                                         class="w-100 h-100 object-fit-cover transition-img" 
                                         alt="<?= $g['judul']; ?>">
                                    
                                    <div class="position-absolute bottom-0 start-0 w-100 p-2 bg-gradient-dark text-white d-flex align-items-center small" 
                                         style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                                        <i class="bi bi-calendar3 me-2"></i> <?= date('d M Y', strtotime($g['created_at'])); ?>
                                    </div>
                                </div>

                                <div class="card-body p-3 d-flex flex-column">
                                    <h6 class="card-title text-dark fw-bold mb-2 text-truncate" title="<?= $g['judul']; ?>">
                                        <?= $g['judul']; ?>
                                    </h6>
                                    
                                    <div class="mt-auto pt-3 border-top d-flex gap-2">
                                        <a href="<?= BASE_URL; ?>admin/editGaleri/<?= $g['id']; ?>" class="btn btn-outline-primary btn-sm flex-fill rounded-pill">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a href="<?= BASE_URL; ?>admin/hapusGaleri/<?= $g['id']; ?>" 
                                           class="btn btn-outline-danger btn-sm flex-fill rounded-pill"
                                           onclick="return confirm('Yakin ingin menghapus foto ini secara permanen?')">
                                            <i class="bi bi-trash"></i> Hapus
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
    .gallery-card {
        transition: all 0.3s ease;
    }
    .gallery-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }
    .transition-img {
        transition: transform 0.5s ease;
    }
    .gallery-card:hover .transition-img {
        transform: scale(1.1);
    }
</style>