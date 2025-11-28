<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>admin">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Welcome, <?= Session::get('nama') ?? Session::get('username') ?>!</h5>
                    <p>Selamat datang di Admin Panel <?= APP_NAME ?>.</p>
                    <p>Level: <span class="badge bg-primary"><?= ucfirst(Session::get('level')) ?></span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Total Admin</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-badge"></i> </div>
                        <div class="ps-3">
                            <h6><?= $data['total_admin'] ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card info-card revenue-card"> <div class="card-body">
                    <h5 class="card-title">Total Fasilitas</h5> <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-hdd-network"></i> </div>
                        <div class="ps-3">
                            <h6><?= $data['total_fasilitas'] ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card info-card customers-card"> <div class="card-body">
                    <h5 class="card-title">Total Galeri</h5> <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-images"></i> </div>
                        <div class="ps-3">
                            <h6><?= $data['total_galeri'] ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card info-card customers-card"> <div class="card-body">
                    <h5 class="card-title">Anggota Lab</h5> <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people-fill"></i> </div>
                        <div class="ps-3">
                            <h6><?= $data['total_anggota'] ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>