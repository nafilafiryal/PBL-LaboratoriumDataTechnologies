<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Edit Mata Kuliah</h4>
        </div>
        <div class="card-body mt-3">
            <form action="<?= BASE_URL; ?>admin/updateMatkul" method="POST">
                <input type="hidden" name="id" value="<?= $data['mk']['id']; ?>">
                
                <div class="mb-3">
                    <label class="form-label">Nama Mata Kuliah</label>
                    <input type="text" class="form-control" name="nama_matkul" value="<?= $data['mk']['nama_matkul']; ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Deskripsi / Kompetensi</label>
                    <textarea class="form-control" name="deskripsi" rows="4" required><?= $data['mk']['deskripsi']; ?></textarea>
                </div>

                <a href="<?= BASE_URL; ?>admin/matakuliah" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>