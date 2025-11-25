<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Tambah Berita Baru</h4>
        </div>
        <div class="card-body">
            <form action="<?= BASE_URL; ?>admin/simpanBerita" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" name="judul" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Konten</label>
                    <textarea class="form-control" name="konten" rows="8" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Utama</label>
                    <input type="file" class="form-control" name="gambar" required>
                    <div class="form-text">Format: JPG, JPEG, PNG. Maksimal 2MB.</div>
                </div>

                <a href="<?= BASE_URL; ?>admin/berita" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>