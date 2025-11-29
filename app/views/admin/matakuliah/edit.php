<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Edit Mata Kuliah</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin/matakuliah">Mata Kuliah</a></li>
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
                        Perbarui Data Mata Kuliah
                    </h5>

                    <form action="<?= BASE_URL; ?>admin/updateMatkul" method="POST">
                        <input type="hidden" name="id" value="<?= $data['mk']['id']; ?>">
                        
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" placeholder="Nama Mata Kuliah" value="<?= $data['mk']['nama_matkul']; ?>" required>
                            <label for="nama_matkul">Mata Kuliah Terkait</label>
                        </div>
                        
                        <div class="form-floating mb-4">
                            <textarea class="form-control" placeholder="Deskripsi" id="deskripsi" name="deskripsi" style="height: 150px;" required><?= $data['mk']['deskripsi']; ?></textarea>
                            <label for="deskripsi">Deskripsi / Kompetensi Utama</label>
                        </div>

                        <div class="d-flex justify-content-between mt-5">
                            <a href="<?= BASE_URL; ?>admin/matakuliah" class="btn btn-outline-secondary px-4 py-2 rounded-pill">
                                <i class="bi bi-arrow-left me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-warning px-5 py-2 rounded-pill fw-bold text-dark shadow-sm">
                                <i class="bi bi-check-circle me-1"></i> Update Data
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</section>