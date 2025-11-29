<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Edit Publikasi</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin/publikasi">Publikasi</a></li>
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
                        Perbarui Data Publikasi
                    </h5>

                    <form action="<?= BASE_URL; ?>admin/updatePublikasi" method="POST">
                        <input type="hidden" name="id" value="<?= $data['p']['id']; ?>">
                        
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Publikasi" value="<?= $data['p']['judul']; ?>" required style="border-color: #dee2e6;">
                            <label for="judul">Judul Publikasi / Jurnal</label>
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Tahun" min="2000" max="<?= date('Y'); ?>" value="<?= $data['p']['tahun']; ?>" required style="border-color: #dee2e6;">
                                    <label for="tahun">Tahun Terbit</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <input type="url" class="form-control" id="link" name="link" placeholder="Link URL" value="<?= $data['p']['link']; ?>" style="border-color: #dee2e6;">
                                    <label for="link">Link Dokumen / DOI (Opsional)</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-5">
                            <a href="<?= BASE_URL; ?>admin/publikasi" class="btn btn-outline-secondary px-4 py-2 rounded-pill">
                                <i class="bi bi-arrow-left me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-warning px-5 py-2 rounded-pill fw-bold text-white shadow-sm">
                                <i class="bi bi-check-circle me-1"></i> Update Perubahan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>