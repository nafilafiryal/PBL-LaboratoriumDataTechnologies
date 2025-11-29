<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Anggota Lab</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item active">Anggota</li>
        </ol>
    </nav>
</div>

<section class="section mt-4">
    
    <div class="card shadow-sm border-0" style="border-top: 4px solid #1a4d80 !important; border-radius: 8px;">
        <div class="card-body p-4">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="m-0 fw-bold text-primary" style="font-family: 'Nunito', sans-serif; color: #1a4d80 !important;">
                        <i class="bi bi-people-fill me-2"></i> Daftar Dosen & Staff
                    </h5>
                    <p class="text-muted small m-0 ps-4">Kelola data anggota laboratorium</p>
                </div>
                <a href="<?= BASE_URL ?>admin/tambahTeam" class="btn btn-primary rounded-pill px-4 shadow-sm" style="background-color: #1a4d80; border-color: #1a4d80;">
                    <i class="bi bi-person-plus-fill me-1"></i> Tambah Anggota
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
                <?php if (empty($data['team'])): ?>
                    <div class="col-12">
                        <div class="text-center py-5 text-muted bg-light rounded border border-dashed">
                            <div style="font-size: 3rem; opacity: 0.3;">
                                <i class="bi bi-person-x"></i>
                            </div>
                            <h6 class="mt-3">Belum ada data anggota.</h6>
                            <p class="small mb-0">Silakan tambahkan anggota baru.</p>
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach ($data['team'] as $m) : ?>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="card h-100 shadow-sm border-0 member-card text-center position-relative overflow-hidden">
                                
                                <div style="height: 80px; background: linear-gradient(45deg, #1a4d80, #2b78e4);"></div>
                                
                                <div class="card-body p-0 pb-4">
                                    <div class="position-relative" style="margin-top: -50px;">
                                        <div class="mx-auto rounded-circle p-1 bg-white shadow-sm" style="width: 100px; height: 100px;">
                                            <img src="<?= BASE_URL; ?>assets/img/team/<?= $m['gambar'] ?? 'default.jpg'; ?>" 
                                                 alt="<?= $m['nama']; ?>"
                                                 class="rounded-circle w-100 h-100" 
                                                 style="object-fit: cover;">
                                        </div>
                                    </div>

                                    <div class="mt-3 px-3">
                                        <h6 class="fw-bold text-dark mb-1"><?= $m['nama']; ?></h6>
                                        <span class="badge bg-light text-primary border mb-2"><?= $m['posisi']; ?></span>
                                        
                                        <?php if (!empty($m['nip'])): ?>
                                            <p class="text-muted small mb-1"><i class="bi bi-card-heading me-1"></i> NIP: <?= $m['nip']; ?></p>
                                        <?php endif; ?>
                                        
                                        <p class="text-muted small mb-3 text-truncate" title="<?= $m['kontak']; ?>">
                                            <i class="bi bi-envelope me-1"></i> <?= $m['kontak']; ?>
                                        </p>
                                    </div>

                                    <div class="d-flex justify-content-center gap-2 px-4">
                                        <a href="<?= BASE_URL; ?>admin/editTeam/<?= $m['id']; ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a href="<?= BASE_URL; ?>admin/hapusTeam/<?= $m['id']; ?>" 
                                           class="btn btn-outline-danger btn-sm rounded-pill px-3"
                                           onclick="return confirm('Yakin ingin menghapus anggota ini?')">
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
    .member-card {
        transition: all 0.3s ease;
        background-color: #fff;
    }
    .member-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }
</style>