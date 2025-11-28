<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Manajemen Galeri</h3>
        <a href="<?= BASE_URL ?>admin/tambahGaleri" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Tambah Foto</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Judul / Keterangan</th>
                            <th>Tanggal Upload</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data['galeri'] as $g) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <img src="<?= BASE_URL; ?>assets/img/gallery/<?= $g['file_path']; ?>" width="100" class="img-thumbnail">
                            </td>
                            <td><?= $g['judul']; ?></td>
                            <td><?= date('d M Y', strtotime($g['created_at'])); ?></td>
                            <td>
                                <a href="<?= BASE_URL; ?>admin/editGaleri/<?= $g['id']; ?>" class="btn btn-sm btn-warning text-white"><i class="bi bi-pencil"></i></a>
                                <a href="<?= BASE_URL; ?>admin/hapusGaleri/<?= $g['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus foto ini?')"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>