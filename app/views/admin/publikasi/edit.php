<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Edit Publikasi</h4>
        </div>
        <div class="card-body mt-3">
            <form action="<?= BASE_URL; ?>admin/updatePublikasi" method="POST">
                <input type="hidden" name="id" value="<?= $data['p']['id']; ?>">
                
                <div class="mb-3">
                    <label class="form-label">Judul Publikasi / Jurnal</label>
                    <input type="text" class="form-control" name="judul" value="<?= $data['p']['judul']; ?>" required>
                </div>
                
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" name="tahun" min="2000" max="<?= date('Y'); ?>" value="<?= $data['p']['tahun']; ?>" required>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Link Jurnal (URL)</label>
                        <input type="url" class="form-control" name="link" value="<?= $data['p']['link']; ?>" required>
                    </div>
                </div>

                <a href="<?= BASE_URL; ?>admin/publikasi" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>