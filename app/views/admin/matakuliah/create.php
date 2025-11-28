<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Mata Kuliah</h4>
        </div>
        <div class="card-body mt-3">
            <form action="<?= BASE_URL; ?>admin/simpanMatkul" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Mata Kuliah</label>
                    <input type="text" class="form-control" name="nama_matkul" placeholder="Contoh: Pemrograman Web Lanjut" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Deskripsi / Kompetensi</label>
                    <textarea class="form-control" name="deskripsi" rows="4" placeholder="Jelaskan secara singkat tentang mata kuliah ini" required></textarea>
                </div>

                <a href="<?= BASE_URL; ?>admin/matakuliah" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>