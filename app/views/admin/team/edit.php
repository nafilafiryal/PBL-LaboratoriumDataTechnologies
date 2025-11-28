<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Edit Anggota Lab</h4>
        </div>
        <div class="card-body mt-3">
            <form action="<?= BASE_URL; ?>admin/updateTeam" method="POST">
                <input type="hidden" name="id" value="<?= $data['member']['id']; ?>">
                
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap & Gelar</label>
                    <input type="text" class="form-control" name="nama" value="<?= $data['member']['nama']; ?>" required>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">NIP / NIDN</label>
                        <input type="text" class="form-control" name="nip" value="<?= $data['member']['nip']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Posisi / Jabatan</label>
                        <select class="form-select" name="posisi" required>
                            <option value="<?= $data['member']['posisi']; ?>" selected><?= $data['member']['posisi']; ?> (Saat Ini)</option>
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
                    <input type="email" class="form-control" name="kontak" value="<?= $data['member']['kontak']; ?>">
                </div>

                <a href="<?= BASE_URL; ?>admin/team" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>