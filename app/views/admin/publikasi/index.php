<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Manajemen Publikasi Jurnal</h3>
        <a href="<?= BASE_URL ?>admin/tambahPublikasi" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Publikasi</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul Publikasi</th>
                            <th>Tahun</th>
                            <th>Link</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data['publikasi'] as $p) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $p['judul']; ?></td>
                            <td><span class="badge bg-secondary"><?= $p['tahun']; ?></span></td>
                            <td>
                                <?php if (!empty($p['link'])) : ?>
                                    <a href="<?= $p['link']; ?>" target="_blank" class="btn btn-sm btn-outline-primary"><i class="bi bi-link-45deg"></i> Lihat</a>
                                <?php else : ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= BASE_URL; ?>admin/editPublikasi/<?= $p['id']; ?>" class="btn btn-sm btn-warning text-white"><i class="bi bi-pencil"></i></a>
                                <a href="<?= BASE_URL; ?>admin/hapusPublikasi/<?= $p['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus publikasi ini?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>