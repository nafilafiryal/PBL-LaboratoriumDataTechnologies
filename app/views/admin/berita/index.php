<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Manajemen Berita</h3>
        <a href="<?= BASE_URL; ?>admin/tambahBerita" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Berita</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data['berita'] as $b) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <img src="<?= BASE_URL; ?>assets/img/berita/<?= $b['gambar']; ?>" width="80" class="rounded">
                            </td>
                            <td><?= $b['judul']; ?></td>
                            <td>
                                <?= date('d M Y', strtotime($b['tanggal_publish'] ?? $b['created_at'])) ?>
                            </td>
                            <td>
                                <a href="<?= BASE_URL; ?>admin/editBerita/<?= $b['id']; ?>" class="btn btn-sm btn-warning text-white"><i class="bi bi-pencil"></i></a>
                                <a href="<?= BASE_URL; ?>admin/hapusBerita/<?= $b['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>