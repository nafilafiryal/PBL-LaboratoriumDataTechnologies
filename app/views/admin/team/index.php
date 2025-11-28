<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Manajemen Anggota Lab</h3>
        <a href="<?= BASE_URL ?>admin/tambahTeam" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i> Tambah Anggota</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Lengkap</th>
                            <th>Posisi</th>
                            <th>Kontak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data['team'] as $m) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <img src="<?= BASE_URL; ?>assets/img/team/<?= $m['gambar'] ?? 'default.jpg'; ?>" 
                                     width="50" height="50" 
                                     class="rounded-circle" 
                                     style="object-fit: cover; border: 2px solid #ddd;">
                            </td>
                            <td>
                                <strong><?= $m['nama']; ?></strong><br>
                                <small class="text-muted"><?= $m['nip'] ?? '-'; ?></small>
                            </td>
                            <td><span class="badge bg-info text-dark"><?= $m['posisi']; ?></span></td>
                            <td><?= $m['kontak']; ?></td>
                            <td>
                                <a href="<?= BASE_URL; ?>admin/editTeam/<?= $m['id']; ?>" class="btn btn-sm btn-warning text-white"><i class="bi bi-pencil"></i></a>
                                <a href="<?= BASE_URL; ?>admin/hapusTeam/<?= $m['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus anggota ini?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>