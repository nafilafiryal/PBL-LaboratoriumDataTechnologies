<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Profil & Visi Misi</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item active">Profil</li>
        </ol>
    </nav>
</div>

<section class="section mt-4">
    <div class="row">
        <div class="col-lg-12">
            
            <?php 
            $flash = Session::getFlash();
            if ($flash): 
            ?>
                <div class="alert alert-<?= ($flash['type'] == 'success') ? 'success' : 'danger' ?> alert-dismissible fade show shadow-sm border-0" role="alert">
                    <i class="bi <?= ($flash['type'] == 'success') ? 'bi-check-circle' : 'bi-exclamation-triangle' ?> me-1"></i>
                    <?= $flash['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="<?= BASE_URL; ?>admin/updateProfil" method="POST">
                
                <div class="card shadow-sm border-0 mb-4" style="border-top: 4px solid #1a4d80 !important; border-radius: 8px;">
                    <div class="card-body p-4">
                        <h5 class="card-title text-uppercase fw-bold mb-3" style="color: #1a4d80; font-family: 'Nunito', sans-serif;">
                            <i class="bi bi-building me-2"></i> Profil Laboratorium
                        </h5>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Tulis profil laboratorium di sini..." id="profil" name="profil" style="height: 200px; border-color: #dee2e6;"><?= $data['profil']['profil'] ?? '' ?></textarea>
                            <label for="profil" class="text-muted">Deskripsi Profil & Sejarah Singkat</label>
                        </div>
                        <div class="form-text text-muted ps-1 mt-2 small">
                            <i class="bi bi-info-circle me-1"></i> Jelaskan sejarah singkat, fokus penelitian, dan tujuan utama laboratorium.
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0 h-100" style="border-top: 4px solid #2b78e4 !important; border-radius: 8px;">
                            <div class="card-body p-4">
                                <h5 class="card-title text-uppercase fw-bold mb-3" style="color: #2b78e4; font-family: 'Nunito', sans-serif;">
                                    <i class="bi bi-eye me-2"></i> Visi
                                </h5>
                                <div class="form-floating h-100">
                                    <textarea class="form-control" placeholder="Tulis visi di sini..." id="visi" name="visi" style="height: 250px; border-color: #dee2e6;"><?= $data['profil']['visi'] ?? '' ?></textarea>
                                    <label for="visi" class="text-muted">Visi Laboratorium</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow-sm border-0 h-100" style="border-top: 4px solid #1a4d80 !important; border-radius: 8px;">
                            <div class="card-body p-4">
                                <h5 class="card-title text-uppercase fw-bold mb-3" style="color: #1a4d80; font-family: 'Nunito', sans-serif;">
                                    <i class="bi bi-list-task me-2"></i> Misi
                                </h5>
                                <div class="form-floating h-100">
                                    <textarea class="form-control" placeholder="Tulis misi di sini..." id="misi" name="misi" style="height: 250px; border-color: #dee2e6;"><?= $data['profil']['misi'] ?? '' ?></textarea>
                                    <label for="misi" class="text-muted">Misi Laboratorium</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4 gap-2 pb-4">
                    <button type="reset" class="btn btn-light border shadow-sm px-4 py-2 text-muted fw-semibold">
                        <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-primary px-4 py-2 shadow-sm fw-semibold" style="background-color: #1a4d80; border-color: #1a4d80;">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>
    </div>
</section>

<style>
    .form-control:focus {
        border-color: #2b78e4;
        box-shadow: 0 0 0 0.25rem rgba(43, 120, 228, 0.15);
    }
    .card:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.08) !important;
        transition: all 0.3s ease;
    }
</style>