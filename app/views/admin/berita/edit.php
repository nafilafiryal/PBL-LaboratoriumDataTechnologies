<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Edit Berita</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin/berita">Berita</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<section class="section mt-4">
    <form action="<?= BASE_URL; ?>admin/updateBerita" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_berita" value="<?= $data['berita']['id']; ?>">
        
        <div class="row g-4">
            
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4">
                        <h5 class="card-title text-primary mb-3">Edit Konten</h5>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Judul Artikel</label>
                            <input type="text" class="form-control form-control-lg" name="judul" value="<?= $data['berita']['judul']; ?>" required style="border-color: #dee2e6;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-muted">Isi Berita</label>
                            <textarea class="form-control" name="konten" rows="15" required style="border-color: #dee2e6; resize: vertical;"><?= $data['berita']['isi']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title text-primary mb-3">Gambar Utama</h5>
                        
                        <div class="text-center mb-3 p-3 border rounded bg-light" style="min-height: 200px; display: flex; align-items: center; justify-content: center;">
                            <img id="imgPreview" 
                                 src="<?= BASE_URL; ?>assets/img/berita/<?= $data['berita']['gambar']; ?>" 
                                 alt="Preview" 
                                 style="max-width: 100%; max-height: 200px; border-radius: 8px;">
                        </div>

                        <label class="btn btn-outline-primary w-100 mb-2">
                            <i class="bi bi-arrow-repeat me-1"></i> Ganti Gambar
                            <input type="file" class="form-control d-none" name="gambar" id="imgInput" accept="image/*">
                        </label>
                        <div class="form-text text-center small">Biarkan kosong jika tidak ingin mengubah gambar.</div>
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h5 class="card-title text-primary mb-3">Aksi</h5>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning py-2 fw-bold text-white">
                                <i class="bi bi-check-circle me-1"></i> Update Berita
                            </button>
                            <a href="<?= BASE_URL; ?>admin/berita" class="btn btn-light border py-2">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</section>

<script>
    const imgInput = document.getElementById('imgInput');
    const imgPreview = document.getElementById('imgPreview');

    imgInput.onchange = evt => {
        const [file] = imgInput.files;
        if (file) {
            imgPreview.src = URL.createObjectURL(file);
        }
    }
</script>