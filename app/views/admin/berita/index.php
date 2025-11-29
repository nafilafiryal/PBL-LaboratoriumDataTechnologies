<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Manajemen Berita</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item active">Berita</li>
        </ol>
    </nav>
</div>

<section class="section mt-4">
    <div class="row">
        <div class="col-lg-12">
            
            <div class="card shadow-sm border-0" style="border-top: 4px solid #1a4d80 !important; border-radius: 8px;">
                <div class="card-body p-4">
                    
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title m-0 text-primary" style="font-family: 'Nunito', sans-serif; font-weight: 700; color: #1a4d80 !important;">
                            <i class="bi bi-newspaper me-2"></i> Daftar Berita & Artikel
                        </h5>
                        <a href="<?= BASE_URL ?>admin/tambahBerita" class="btn btn-primary rounded-pill px-4 shadow-sm" style="background-color: #1a4d80; border-color: #1a4d80;">
                            <i class="bi bi-plus-lg me-1"></i> Tulis Berita
                        </a>
                    </div>

                    <?php 
                    $flash = Session::getFlash();
                    if ($flash): 
                    ?>
                        <div class="alert alert-<?= ($flash['type'] == 'success') ? 'success' : 'danger' ?> alert-dismissible fade show shadow-sm" role="alert">
                            <i class="bi <?= ($flash['type'] == 'success') ? 'bi-check-circle' : 'bi-exclamation-triangle' ?> me-1"></i>
                            <?= $flash['message'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%" class="text-center">No</th>
                                    <th width="15%">Thumbnail</th>
                                    <th width="40%">Judul Berita</th>
                                    <th width="20%">Tanggal Publish</th>
                                    <th width="20%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($data['berita'])): ?>
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">
                                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                            Belum ada berita yang dipublish.
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php $no = 1; foreach ($data['berita'] as $b) : ?>
                                    <tr>
                                        <td class="text-center fw-bold text-muted"><?= $no++; ?></td>
                                        <td>
                                            <div class="overflow-hidden rounded shadow-sm border" style="width: 80px; height: 60px;">
                                                <img src="<?= BASE_URL; ?>assets/img/berita/<?= $b['gambar']; ?>" 
                                                     alt="Thumb" 
                                                     class="w-100 h-100" 
                                                     style="object-fit: cover;">
                                            </div>
                                        </td>
                                        <td>
                                            <h6 class="mb-1 text-dark fw-bold text-truncate" style="max-width: 300px;"><?= $b['judul']; ?></h6>
                                            <small class="text-muted text-truncate d-block" style="max-width: 300px;">
                                                <?= substr(strip_tags($b['isi']), 0, 50) . '...'; ?>
                                            </small>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark border">
                                                <i class="bi bi-calendar3 me-1"></i>
                                                <?= date('d M Y', strtotime($b['tanggal_publish'] ?? $b['created_at'])) ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group shadow-sm" role="group">
                                                <a href="<?= BASE_URL; ?>admin/editBerita/<?= $b['id']; ?>" class="btn btn-sm btn-outline-warning" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="<?= BASE_URL; ?>admin/hapusBerita/<?= $b['id']; ?>" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus berita ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
            </div>

        </div>
    </div>
</section>