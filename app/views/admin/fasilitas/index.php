<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Manajemen Fasilitas</h3>
        <a href="<?= BASE_URL ?>admin/tambahFasilitas" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Fasilitas</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Fasilitas</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data['fasilitas'] as $f) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $f['nama_fasilitas']; ?></td>
                            <td><?= substr($f['deskripsi'], 0, 100) . '...'; ?></td>
                            <td>
                                <a href="<?= BASE_URL; ?>admin/editFasilitas/<?= $f['id']; ?>" class="btn btn-sm btn-warning text-white"><i class="bi bi-pencil"></i></a>
                                <a href="<?= BASE_URL; ?>admin/hapusFasilitas/<?= $f['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus fasilitas ini?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>