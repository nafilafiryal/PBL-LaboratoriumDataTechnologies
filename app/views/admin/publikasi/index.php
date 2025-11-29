<div class="pagetitle mb-0 pb-2">
    <h1 style="color: #1a4d80; font-weight: 700;">Manajemen Publikasi</h1>
    <nav>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin" style="color: #2b78e4;">Home</a></li>
            <li class="breadcrumb-item active">Publikasi</li>
        </ol>
    </nav>
</div>

<section class="section mt-4">
    <div class="card shadow-sm border-0" style="border-top: 4px solid #1a4d80 !important; border-radius: 8px;">
        <div class="card-body p-4">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h5 class="m-0 fw-bold text-primary" style="font-family: 'Nunito', sans-serif; color: #1a4d80 !important;">
                        <i class="bi bi-journal-text me-2"></i> Daftar Jurnal & Penelitian
                    </h5>
                    <p class="text-muted small m-0 ps-4">Kumpulan publikasi ilmiah civitas akademika</p>
                </div>
                <a href="<?= BASE_URL ?>admin/tambahPublikasi" class="btn btn-primary rounded-pill px-4 shadow-sm" style="background-color: #1a4d80; border-color: #1a4d80;">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Data
                </a>
            </div>

            <?php 
            $flash = Session::getFlash();
            if ($flash): 
            ?>
                <div class="alert alert-<?= ($flash['type'] == 'success') ? 'success' : 'danger' ?> alert-dismissible fade show shadow-sm mb-4" role="alert">
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
                            <th width="50%">Judul Publikasi</th>
                            <th width="15%" class="text-center">Tahun</th>
                            <th width="15%" class="text-center">Link</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($data['publikasi'])): ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-journal-x fs-1 d-block mb-2" style="opacity: 0.3;"></i>
                                    Belum ada data publikasi.
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php $no = 1; foreach ($data['publikasi'] as $p) : ?>
                            <tr>
                                <td class="text-center fw-bold text-muted"><?= $no++; ?></td>
                                <td>
                                    <h6 class="mb-0 text-dark fw-bold"><?= $p['judul']; ?></h6>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark border">
                                        <i class="bi bi-calendar3 me-1"></i> <?= $p['tahun']; ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <?php if (!empty($p['link'])) : ?>
                                        <a href="<?= $p['link']; ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                            <i class="bi bi-box-arrow-up-right me-1"></i> Lihat
                                        </a>
                                    <?php else : ?>
                                        <span class="text-muted small">-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group shadow-sm" role="group">
                                        <a href="<?= BASE_URL; ?>admin/editPublikasi/<?= $p['id']; ?>" class="btn btn-sm btn-outline-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="<?= BASE_URL; ?>admin/hapusPublikasi/<?= $p['id']; ?>" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus publikasi ini?')">
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
</section>