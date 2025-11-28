<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Daftar Mata Kuliah Terkait</h3>
        <a href="<?= BASE_URL ?>admin/tambahMatkul" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Data</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Mata Kuliah Terkait</th> <th>Deskripsi / Kompetensi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data['matkul'] as $mk) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><strong><?= $mk['nama_matkul']; ?></strong></td>
                            <td><?= substr($mk['deskripsi'], 0, 80) . '...'; ?></td>
                            <td>
                                <a href="<?= BASE_URL; ?>admin/editMatkul/<?= $mk['id']; ?>" class="btn btn-sm btn-warning text-white"><i class="bi bi-pencil"></i></a>
                                <a href="<?= BASE_URL; ?>admin/hapusMatkul/<?= $mk['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>