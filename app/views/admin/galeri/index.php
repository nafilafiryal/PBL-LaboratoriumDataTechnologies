<div class="pagetitle">
    <h1>Manajemen Galeri</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Galeri</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center my-3">
                        <h5 class="card-title p-0 m-0">Daftar Foto Kegiatan</h5>
                        <a href="<?= BASE_URL ?>admin/tambahGaleri" class="btn btn-primary rounded-pill">
                            <i class="bi bi-plus-lg me-1"></i> Upload Foto Baru
                        </a>
                    </div>

                    <div class="row g-4">
                        <?php if (empty($data['galeri'])): ?>
                            <div class="col-12 text-center py-5 text-muted">
                                <div style="font-size: 4rem; color: #dee2e6;">
                                    <i class="bi bi-images"></i>
                                </div>
                                <p class="mt-3 fs-5">Belum ada foto di galeri.</p>
                            </div>
                        <?php else: ?>
                            <?php foreach ($data['galeri'] as $g) : ?>
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="card h-100 border shadow-sm hover-card">
                                        <div class="overflow-hidden position-relative" style="height: 200px; background: #f8f9fa;">
                                            <img src="<?= BASE_URL; ?>assets/img/gallery/<?= $g['file_path']; ?>" 
                                                 class="card-img-top w-100 h-100" 
                                                 style="object-fit: cover; transition: transform 0.3s ease;"
                                                 alt="<?= $g['judul']; ?>">
                                        </div>
                                        
                                        <div class="card-body d-flex flex-column">
                                            <h6 class="card-title text-dark fw-bold mb-2 text-truncate" title="<?= $g['judul']; ?>">
                                                <?= $g['judul']; ?>
                                            </h6>
                                            <p class="card-text small text-muted mb-3">
                                                <i class="bi bi-calendar3 me-1"></i> 
                                                <?= date('d M Y', strtotime($g['created_at'])); ?>
                                            </p>
                                            
                                            <div class="mt-auto d-flex gap-2">
                                                <a href="<?= BASE_URL; ?>admin/editGaleri/<?= $g['id']; ?>" class="btn btn-outline-warning btn-sm flex-fill">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </a>
                                                <a href="<?= BASE_URL; ?>admin/hapusGaleri/<?= $g['id']; ?>" 
                                                   class="btn btn-outline-danger btn-sm flex-fill" 
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
        </div>
    </div>
</section>

<style>
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        transition: all 0.3s ease;
    }
    .hover-card:hover img {
        transform: scale(1.05);
    }
</style>