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
                            <th>Nama Lengkap</th>
                            <th>NIP</th>
                            <th>Posisi</th>
                            <th>Kontak (Email)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data['team'] as $m) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $m['nama']; ?></td>
                            <td><?= $m['nip'] ?? '-'; ?></td>
                            <td>
                                <span class="badge bg-info text-dark"><?= $m['posisi']; ?></span>
                            </td>
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