<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Tambah Anggota</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin/team">Anggota</a></li>
            <li class="breadcrumb-item active">Baru</li>
        </ol>
    </nav>
</div>

<section class="section mt-4">
    <form action="<?= BASE_URL; ?>admin/simpanTeam" method="POST" enctype="multipart/form-data">
        <div class="row g-4">
            
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 h-100" style="border-top: 4px solid #1a4d80 !important; border-radius: 8px;">
                    <div class="card-body p-4">
                        <h5 class="card-title text-primary mb-4" style="color: #1a4d80 !important;">Informasi Personal</h5>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase text-muted">Nama Lengkap & Gelar</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" name="nama" placeholder="Contoh: Dr. Budi Santoso, S.Kom., M.T." required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">NIP / NIDN</label>
                                <input type="text" class="form-control" name="nip" placeholder="Nomor Induk Pegawai">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold small text-uppercase text-muted">Posisi / Jabatan</label>
                                <select class="form-select" name="posisi" required>
                                    <option value="">-- Pilih Posisi --</option>
                                    <option value="Kepala Lab">Kepala Lab</option>
                                    <option value="Laboran">Laboran / Teknisi</option>
                                    <option value="Dosen Peneliti">Dosen Peneliti</option>
                                    <option value="Anggota Riset">Anggota Riset</option>
                                    <option value="Asisten Lab">Asisten Lab</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold small text-uppercase text-muted">Kontak (Email)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control" name="kontak" placeholder="email@polinema.ac.id">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-4 text-center">
                        <h5 class="card-title text-primary mb-3" style="color: #1a4d80 !important;">Foto Profil</h5>
                        
                        <div class="mx-auto mb-3 p-1 border rounded-circle bg-light" style="width: 150px; height: 150px; overflow: hidden;">
                            <img id="imgPreview" src="<?= BASE_URL ?>assets/img/profile-default.jpg" 
                                 alt="Preview" 
                                 class="w-100 h-100 rounded-circle" 
                                 style="object-fit: cover;">
                        </div>

                        <label class="btn btn-outline-primary w-100 mb-2 rounded-pill">
                            <i class="bi bi-camera me-1"></i> Pilih Foto
                            <input type="file" class="form-control d-none" name="gambar" id="imgInput" accept="image/*">
                        </label>
                        <div class="form-text small">Format: JPG, PNG. Rasio 1:1.</div>
                    </div>
                </div>

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary py-2 fw-bold rounded-pill" style="background-color: #1a4d80; border-color: #1a4d80;">
                                <i class="bi bi-save me-1"></i> Simpan Data
                            </button>
                            <a href="<?= BASE_URL; ?>admin/team" class="btn btn-light border py-2 rounded-pill">
                                <i class="bi bi-arrow-left me-1"></i> Batal
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