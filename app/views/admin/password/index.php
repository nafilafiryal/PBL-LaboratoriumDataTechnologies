<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-shield-lock"></i> Ganti Password</h5>
                </div>
                <div class="card-body">
                    
                    <?php Flasher::flash(); ?>

                    <form action="<?= BASE_URL ?>admin/updatePassword" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Password Lama</label>
                            <input type="password" name="current_password" class="form-control" required>
                        </div>
                        
                        <hr>

                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="new_password" class="form-control" minlength="6" required>
                            <div class="form-text">Minimal 6 karakter.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Simpan Password Baru</button>
                            <a href="<?= BASE_URL ?>admin" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>