<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Publikasi Baru</h4>
        </div>
        <div class="card-body mt-3">
            <form action="<?= BASE_URL; ?>admin/simpanPublikasi" method="POST">
                <div class="mb-3">
                    <label class="form-label">Judul Publikasi / Jurnal</label>
                    <input type="text" class="form-control" name="judul" required>
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" name="tahun" min="2000" max="<?= date('Y'); ?>" value="<?= date('Y'); ?>" required>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Link Jurnal (URL)</label>
                        <input type="url" class="form-control" name="link" placeholder="https://scholar.google.com/..." required>
                    </div>
                </div>

                <a href="<?= BASE_URL; ?>admin/publikasi" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>