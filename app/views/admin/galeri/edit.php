<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Edit Galeri</h4>
        </div>
        <div class="card-body mt-3">
            <form action="<?= BASE_URL; ?>admin/updateGaleri" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['g']['id']; ?>">
                
                <div class="mb-3">
                    <label class="form-label">Judul Foto</label>
                    <input type="text" class="form-control" name="judul" value="<?= $data['g']['judul']; ?>" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Ganti Gambar (Opsional)</label>
                    <br>
                    <img src="<?= BASE_URL; ?>assets/img/gallery/<?= $data['g']['file_path']; ?>" width="150" class="img-thumbnail mb-2">
                    <input type="file" class="form-control" name="gambar">
                    <div class="form-text">Biarkan kosong jika tidak ingin mengganti gambar.</div>
                </div>

                <a href="<?= BASE_URL; ?>admin/galeri" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>