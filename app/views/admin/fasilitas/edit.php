<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Edit Fasilitas</h4>
        </div>
        <div class="card-body mt-3">
            <form action="<?= BASE_URL; ?>admin/updateFasilitas" method="POST">
                <input type="hidden" name="id" value="<?= $data['fasilitas']['id']; ?>">
                
                <div class="mb-3">
                    <label class="form-label">Nama Fasilitas</label>
                    <input type="text" class="form-control" name="nama_fasilitas" value="<?= $data['fasilitas']['nama_fasilitas']; ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="5" required><?= $data['fasilitas']['deskripsi']; ?></textarea>
                </div>

                <a href="<?= BASE_URL; ?>admin/fasilitas" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>