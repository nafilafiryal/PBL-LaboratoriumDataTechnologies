<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Profil Saya</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item active">My Profile</li>
        </ol>
    </nav>
</div>

<section class="section mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="card shadow border-0" style="border-top: 4px solid #1a4d80 !important; border-radius: 8px;">
                <div class="card-body p-5">
                    
                    <div class="text-center mb-4">
                        <div class="mx-auto mb-3 p-1 border rounded-circle bg-light position-relative" style="width: 120px; height: 120px;">
                            <img src="<?= BASE_URL ?>assets/img/team/team-1.jpg" alt="Profile" class="w-100 h-100 rounded-circle" style="object-fit: cover;">
                        </div>
                        <h4 class="fw-bold" style="color: #1a4d80;"><?= $data['user']['nama']; ?></h4>
                        <span class="badge bg-primary rounded-pill px-3"><?= ucfirst($data['user']['level']); ?></span>
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

                    <form action="<?= BASE_URL ?>admin/updateMyProfile" method="POST">
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase text-muted">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="<?= $data['user']['nama']; ?>" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">Username</label>
                                <input type="text" class="form-control" name="username" value="<?= $data['user']['username']; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $data['user']['email']; ?>" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary py-2 rounded-pill fw-bold shadow-sm" style="background-color: #1a4d80; border-color: #1a4d80;">
                                <i class="bi bi-save me-2"></i> Simpan Perubahan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>