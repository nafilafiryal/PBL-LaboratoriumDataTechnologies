<div class="pagetitle">
    <h1>Tambah Galeri</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin/galeri">Galeri</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="card-title m-0 text-white"><i class="bi bi-cloud-upload me-2"></i> Upload Foto Baru</h5>
                </div>
                <div class="card-body p-4">
                    
                    <form action="<?= BASE_URL; ?>admin/simpanGaleri" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label fw-bold">Judul Foto</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="judul" placeholder="Contoh: Kegiatan Seminar Nasional..." required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label fw-bold">File Gambar</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="gambar" id="imgInput" accept="image/*" required>
                                <div class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB.</div>
                                
                                <div class="mt-3 p-2 border rounded bg-light text-center" style="min-height: 150px; display: none;" id="previewContainer">
                                    <p class="small text-muted mb-2">Preview:</p>
                                    <img id="imgPreview" src="#" alt="Preview" style="max-height: 200px; max-width: 100%; border-radius: 8px;">
                                </div>
                            </div>
                        </div>

                        <div class="text-end border-top pt-3">
                            <a href="<?= BASE_URL; ?>admin/galeri" class="btn btn-secondary me-2">Batal</a>
                            <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan Foto</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const imgInput = document.getElementById('imgInput');
    const previewContainer = document.getElementById('previewContainer');
    const imgPreview = document.getElementById('imgPreview');

    imgInput.onchange = evt => {
        const [file] = imgInput.files;
        if (file) {
            imgPreview.src = URL.createObjectURL(file);
            previewContainer.style.display = 'block';
        }
    }
</script>