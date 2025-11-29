<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Edit Anggota</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin/team">Anggota</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<section class="section mt-4">
    <form action="<?= BASE_URL; ?>admin/updateTeam" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['member']['id']; ?>">
        
        <div class="row g-4">
            
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 h-100" style="border-top: 4px solid #ffc107 !important; border-radius: 8px;">
                    <div class="card-body p-4">
                        <h5 class="card-title text-warning mb-4">Edit Informasi</h5>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase text-muted">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="<?= $data['member']['nama']; ?>" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">NIP</label>
                                <input type="text" class="form-control" name="nip" value="<?= $data['member']['nip']; ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">Posisi</label>
                                <select class="form-select" name="posisi" required>
                                    <option value="<?= $data['member']['posisi']; ?>" selected hidden><?= $data['member']['posisi']; ?></option>
                                    <option value="Kepala Lab">Kepala Lab</option>
                                    <option value="Laboran">Laboran / Teknisi</option>
                                    <option value="Dosen Peneliti">Dosen Peneliti</option>
                                    <option value="Anggota Riset">Anggota Riset</option>
                                    <option value="Asisten Lab">Asisten Lab</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase text-muted">Email</label>
                            <input type="email" class="form-control" name="kontak" value="<?= $data['member']['kontak']; ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-4 text-center">
                        <h5 class="card-title text-muted mb-3">Foto Profil</h5>
                        
                        <div class="mx-auto mb-3 p-1 border rounded-circle bg-light position-relative" style="width: 150px; height: 150px;">
                            <img id="imgPreview" 
                                 src="<?= BASE_URL; ?>assets/img/team/<?= $data['member']['gambar'] ?? 'default.jpg'; ?>" 
                                 alt="Preview" 
                                 class="w-100 h-100 rounded-circle" 
                                 style="object-fit: cover;">
                        </div>

                        <label class="btn btn-outline-warning w-100 mb-2 rounded-pill">
                            <i class="bi bi-camera-fill me-1"></i> Ganti Foto
                            <input type="file" class="form-control d-none" name="gambar" id="imgInput" accept="image/*">
                        </label>
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning py-2 fw-bold text-dark rounded-pill">
                                <i class="bi bi-check-circle me-1"></i> Update Data
                            </button>
                            <a href="<?= BASE_URL; ?>admin/team" class="btn btn-light border py-2 rounded-pill">
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