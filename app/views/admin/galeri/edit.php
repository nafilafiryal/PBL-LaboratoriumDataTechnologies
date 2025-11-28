<div class="pagetitle">
    <h1>Edit Galeri</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin/galeri">Galeri</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark py-3">
                    <h5 class="card-title m-0 text-dark"><i class="bi bi-pencil-square me-2"></i> Edit Data Foto</h5>
                </div>
                <div class="card-body p-4">
                    
                    <form action="<?= BASE_URL; ?>admin/updateGaleri" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $data['g']['id']; ?>">
                        
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label fw-bold">Judul Foto</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="judul" value="<?= $data['g']['judul']; ?>" required>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label fw-bold">Gambar Saat Ini</label>
                            <div class="col-sm-9">
                                <div class="mb-3">
                                    <img src="<?= BASE_URL; ?>assets/img/gallery/<?= $data['g']['file_path']; ?>" 
                                         class="img-thumbnail shadow-sm" 
                                         style="max-height: 200px; border-radius: 8px;">
                                </div>
                                
                                <label class="form-label text-primary fw-bold" style="cursor: pointer;">
                                    <i class="bi bi-arrow-repeat"></i> Ganti Gambar (Opsional)
                                </label>
                                <input type="file" class="form-control" name="gambar" id="imgInput" accept="image/*">
                                <div class="form-text">Biarkan kosong jika tidak ingin mengganti gambar.</div>

                                <div class="mt-3 p-2 border rounded bg-light text-center" style="display: none;" id="previewContainer">
                                    <p class="small text-muted mb-2">Preview Gambar Baru:</p>
                                    <img id="imgPreview" src="#" alt="Preview" style="max-height: 200px; max-width: 100%; border-radius: 8px;">
                                </div>
                            </div>
                        </div>

                        <div class="text-end border-top pt-3">
                            <a href="<?= BASE_URL; ?>admin/galeri" class="btn btn-secondary me-2">Kembali</a>
                            <button type="submit" class="btn btn-warning px-4"><i class="bi bi-check-circle me-1"></i> Update Data</button>
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
        } else {
            previewContainer.style.display = 'none';
        }
    }
</script>