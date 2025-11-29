<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Edit Galeri</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin/galeri">Galeri</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<section class="section mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="card shadow border-0" style="border-top: 4px solid #ffc107 !important; border-radius: 8px;">
                <div class="card-body p-5">
                    
                    <h5 class="card-title text-center mb-4" style="color: #1a4d80; font-family: 'Nunito', sans-serif;">
                        <i class="bi bi-pencil-square fs-1 d-block mb-2 text-warning"></i>
                        Update Informasi Foto
                    </h5>

                    <form action="<?= BASE_URL; ?>admin/updateGaleri" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $data['g']['id']; ?>">
                        
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Foto" value="<?= $data['g']['judul']; ?>" required style="border-color: #dee2e6;">
                            <label for="judul">Judul / Keterangan Foto</label>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small text-uppercase">Gambar Saat Ini</label>
                            
                            <div class="text-center p-3 border rounded bg-light mb-3">
                                <img src="<?= BASE_URL; ?>assets/img/gallery/<?= $data['g']['file_path']; ?>" 
                                     class="img-fluid rounded shadow-sm" 
                                     style="max-height: 300px;">
                            </div>

                            <label class="form-label fw-bold text-primary mt-2 cursor-pointer">
                                <i class="bi bi-arrow-repeat me-1"></i> Ganti Gambar (Opsional)
                            </label>
                            <input type="file" class="form-control" name="gambar" accept="image/*">
                            <div class="form-text mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</div>
                        </div>

                        <div class="d-flex justify-content-between mt-5">
                            <a href="<?= BASE_URL; ?>admin/galeri" class="btn btn-outline-secondary px-4 py-2 rounded-pill">
                                <i class="bi bi-arrow-left me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-warning px-5 py-2 rounded-pill fw-bold text-dark shadow-sm">
                                <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>