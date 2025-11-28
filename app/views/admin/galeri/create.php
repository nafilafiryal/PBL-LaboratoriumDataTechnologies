<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Foto Galeri</h4>
        </div>
        <div class="card-body mt-3">
            <form action="<?= BASE_URL; ?>admin/simpanGaleri" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Judul Foto</label>
                    <input type="text" class="form-control" name="judul" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">File Gambar</label>
                    <input type="file" class="form-control" name="gambar" required>
                    <div class="form-text">Format: JPG, JPEG, PNG. Maksimal 2MB.</div>
                </div>

                <a href="<?= BASE_URL; ?>admin/galeri" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>