<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Anggota Lab</h4>
        </div>
        <div class="card-body mt-3">
            <form action="<?= BASE_URL; ?>admin/simpanTeam" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap & Gelar</label>
                    <input type="text" class="form-control" name="nama" required>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">NIP / NIDN</label>
                        <input type="text" class="form-control" name="nip">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Posisi / Jabatan</label>
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
                    <label class="form-label">Kontak (Email)</label>
                    <input type="email" class="form-control" name="kontak">
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" class="form-control" name="gambar">
                    <div class="form-text">Format: JPG/PNG. Disarankan rasio 1:1 (Kotak).</div>
                </div>

                <a href="<?= BASE_URL; ?>admin/team" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>