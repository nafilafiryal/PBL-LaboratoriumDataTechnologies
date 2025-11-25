<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Kelola Profil, Visi & Misi</h5>
        </div>
        <div class="card-body">
            <form action="<?= BASE_URL; ?>admin/updateProfil" method="POST">
                <div class="mb-3">
                    <label for="sejarah" class="form-label fw-bold">Sejarah Laboratorium</label>
                    <textarea class="form-control" id="sejarah" name="sejarah" rows="5" required><?= $data['profil']['sejarah']; ?></textarea>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="visi" class="form-label fw-bold">Visi</label>
                            <textarea class="form-control" id="visi" name="visi" rows="4" required><?= $data['profil']['visi']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="misi" class="form-label fw-bold">Misi</label>
                            <textarea class="form-control" id="misi" name="misi" rows="4" required><?= $data['profil']['misi']; ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>