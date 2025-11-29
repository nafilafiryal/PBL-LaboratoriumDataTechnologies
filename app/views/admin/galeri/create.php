<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Upload Foto</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin/galeri">Galeri</a></li>
            <li class="breadcrumb-item active">Upload</li>
        </ol>
    </nav>
</div>

<section class="section mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="card shadow border-0" style="border-top: 4px solid #1a4d80 !important; border-radius: 8px;">
                <div class="card-body p-5">
                    
                    <h5 class="card-title text-center mb-4" style="color: #1a4d80; font-family: 'Nunito', sans-serif;">
                        <i class="bi bi-cloud-arrow-up fs-1 d-block mb-2 text-primary"></i>
                        Unggah Foto Kegiatan
                    </h5>

                    <form action="<?= BASE_URL; ?>admin/simpanGaleri" method="POST" enctype="multipart/form-data">
                        
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Foto" required style="border-color: #dee2e6;">
                            <label for="judul">Judul / Keterangan Foto</label>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small text-uppercase">File Gambar</label>
                            
                            <div class="text-center p-3 border rounded bg-light mb-3 position-relative" style="min-height: 250px; display: flex; align-items: center; justify-content: center; border-style: dashed !important;">
                                <img id="imgPreview" src="#" alt="Preview" style="max-width: 100%; max-height: 300px; display: none; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                                <div id="placeholderText" class="text-muted">
                                    <i class="bi bi-image fs-1 d-block mb-2"></i>
                                    <span>Preview gambar akan muncul di sini</span>
                                </div>
                            </div>

                            <input type="file" class="form-control" name="gambar" id="imgInput" accept="image/*" required>
                            <div class="form-text mt-2"><i class="bi bi-info-circle me-1"></i> Format: JPG, JPEG, PNG. Maksimal 2MB.</div>
                        </div>

                        <div class="d-flex justify-content-between mt-5">
                            <a href="<?= BASE_URL; ?>admin/galeri" class="btn btn-outline-secondary px-4 py-2 rounded-pill">
                                <i class="bi bi-arrow-left me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill fw-bold shadow-sm" style="background-color: #1a4d80; border-color: #1a4d80;">
                                <i class="bi bi-upload me-1"></i> Upload Sekarang
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<script>
    const imgInput = document.getElementById('imgInput');
    const imgPreview = document.getElementById('imgPreview');
    const placeholderText = document.getElementById('placeholderText');

    imgInput.onchange = evt => {
        const [file] = imgInput.files;
        if (file) {
            imgPreview.src = URL.createObjectURL(file);
            imgPreview.style.display = 'block';
            placeholderText.style.display = 'none';
        }
    }
</script>