<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Ganti Password</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item active">Password</li>
        </ol>
    </nav>
</div>

<section class="section mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            
            <div class="card shadow border-0" style="border-top: 4px solid #1a4d80 !important; border-radius: 8px;">
                <div class="card-body p-5">
                    
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" 
                             style="width: 70px; height: 70px; background-color: #e6f0ff; color: #1a4d80;">
                            <i class="bi bi-shield-lock-fill fs-1"></i>
                        </div>
                        <h5 class="card-title p-0 text-primary" style="font-family: 'Nunito', sans-serif; font-weight: 700; color: #1a4d80 !important;">
                            Amankan Akun Anda
                        </h5>
                        <p class="text-muted small">Perbarui password secara berkala untuk keamanan.</p>
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

                    <form action="<?= BASE_URL ?>admin/updatePassword" method="POST">
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted">Password Lama</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-key"></i></span>
                                <input type="password" name="current_password" class="form-control border-start-0 border-end-0" id="currentPass" required placeholder="Masukkan password saat ini">
                                <button class="btn btn-light border border-start-0" type="button" onclick="togglePassword('currentPass', this)">
                                    <i class="bi bi-eye-slash text-muted"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase text-muted">Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock"></i></span>
                                <input type="password" name="new_password" class="form-control border-start-0 border-end-0" id="newPass" minlength="6" required placeholder="Minimal 6 karakter">
                                <button class="btn btn-light border border-start-0" type="button" onclick="togglePassword('newPass', this)">
                                    <i class="bi bi-eye-slash text-muted"></i>
                                </button>
                            </div>
                            <div class="form-text mt-1"><i class="bi bi-info-circle me-1"></i> Gunakan kombinasi huruf dan angka.</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold small text-uppercase text-muted">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-check2-square"></i></span>
                                <input type="password" name="confirm_password" class="form-control border-start-0 border-end-0" id="confirmPass" required placeholder="Ulangi password baru">
                                <button class="btn btn-light border border-start-0" type="button" onclick="togglePassword('confirmPass', this)">
                                    <i class="bi bi-eye-slash text-muted"></i>
                                </button>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-5">
                            <button type="submit" class="btn btn-primary py-2 rounded-pill fw-bold shadow-sm" style="background-color: #1a4d80; border-color: #1a4d80;">
                                <i class="bi bi-save me-2"></i> Simpan Password Baru
                            </button>
                            <a href="<?= BASE_URL ?>admin" class="btn btn-outline-secondary py-2 rounded-pill">
                                <i class="bi bi-x-circle me-2"></i> Batal
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<script>
    function togglePassword(inputId, btn) {
        const input = document.getElementById(inputId);
        const icon = btn.querySelector('i');
        
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
            icon.classList.remove('text-muted');
            icon.classList.add('text-primary');
        } else {
            input.type = "password";
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
            icon.classList.remove('text-primary');
            icon.classList.add('text-muted');
        }
    }
</script>

<style>
    .input-group-text {
        border-color: #dee2e6;
    }
    .form-control:focus {
        box-shadow: none;
        border-color: #dee2e6; 
    }

    .input-group:focus-within {
        box-shadow: 0 0 0 0.25rem rgba(26, 77, 128, 0.15);
        border-radius: 0.375rem;
    }
    .input-group:focus-within .input-group-text,
    .input-group:focus-within .form-control,
    .input-group:focus-within .btn {
        border-color: #1a4d80;
    }
</style>