<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Fasilitas Baru</h4>
        </div>
        <div class="card-body mt-3">
            <form action="<?= BASE_URL; ?>admin/simpanFasilitas" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Fasilitas</label>
                    <input type="text" class="form-control" name="nama_fasilitas" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="5" required></textarea>
                </div>

                <a href="<?= BASE_URL; ?>admin/fasilitas" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>