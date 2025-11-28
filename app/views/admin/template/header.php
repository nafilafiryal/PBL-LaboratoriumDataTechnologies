<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $data['title'] ?? 'Admin Panel' ?></title>
    
    <link href="<?= BASE_URL ?>assets/img/favicon1.png" rel="icon">
    <link href="<?= BASE_URL ?>assets/img/apple-touch-icon1.png" rel="apple-touch-icon">

    <link href="<?= BASE_URL ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="<?= BASE_URL ?>assets/css/main.css" rel="stylesheet">
    
    <style>
        /* Styling Khusus Admin agar rapi */
        body {
            background-color: #f6f9ff;
            color: #444444;
            font-family: "Open Sans", sans-serif;
        }
        
        /* --- HEADER STYLING --- */
        .header {
            transition: all 0.5s;
            z-index: 997;
            height: 60px;
            box-shadow: 0px 2px 20px rgba(1, 41, 112, 0.1);
            background-color: #fff;
            padding-left: 20px;
        }

        .header .logo {
            line-height: 1;
        }
        
        .header .logo i {
            font-size: 26px;
            margin-right: 8px;
            color: #012970;
            font-weight: 700;
        }

        .header .logo span {
            font-size: 24px;
            font-weight: 700;
            color: #012970;
            font-family: "Nunito", sans-serif;
        }

        .header .nav-profile img {
            max-height: 36px !important;
            width: 36px !important;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 10px;
        }

        .header .nav-profile span {
            font-size: 14px;
            font-weight: 600;
            color: #4154f1;
        }

        /* --- DROPDOWN PROFILE --- */
        .profile .dropdown-header h6 {
            font-size: 18px;
            margin-bottom: 0;
            font-weight: 600;
            color: #444444;
        }

        .profile .dropdown-header span {
            font-size: 14px;
        }

        .profile .dropdown-item {
            font-size: 14px;
            padding: 10px 15px;
            transition: 0.3s;
        }

        .profile .dropdown-item i {
            margin-right: 10px;
            font-size: 18px;
            line-height: 0;
        }

        /* --- SIDEBAR STYLING --- */
        .sidebar {
            position: fixed;
            top: 60px;
            left: 0;
            bottom: 0;
            width: 300px;
            z-index: 996;
            transition: all 0.3s;
            padding: 20px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #aab7cf transparent;
            box-shadow: 0px 0px 20px rgba(1, 41, 112, 0.1);
            background-color: #fff;
        }

        .sidebar-nav {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .sidebar-nav li {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .sidebar-nav .nav-item {
            margin-bottom: 5px;
        }

        .sidebar-nav .nav-heading {
            font-size: 11px;
            text-transform: uppercase;
            color: #899bbd;
            font-weight: 600;
            margin: 10px 0 5px 15px;
        }

        .sidebar-nav .nav-link {
            display: flex;
            align-items: center;
            font-size: 15px;
            font-weight: 600;
            color: #4154f1;
            transition: 0.3;
            background: #f6f9ff;
            padding: 10px 15px;
            border-radius: 4px;
        }

        .sidebar-nav .nav-link i {
            font-size: 16px;
            margin-right: 10px;
            color: #4154f1;
        }

        .sidebar-nav .nav-link.collapsed {
            color: #012970;
            background: #fff;
        }

        .sidebar-nav .nav-link.collapsed i {
            color: #899bbd;
        }

        .sidebar-nav .nav-link:hover {
            color: #4154f1;
            background: #f6f9ff;
        }

        .sidebar-nav .nav-link:hover i {
            color: #4154f1;
        }

        /* --- MAIN CONTENT --- */
        #main {
            margin-top: 60px;
            padding: 20px 30px;
            transition: all 0.3s;
        }

        @media (min-width: 1200px) {
            #main, #footer {
                margin-left: 300px;
            }
        }

        @media (max-width: 1199px) {
            .sidebar {
                left: -300px;
            }
            .toggle-sidebar .sidebar {
                left: 0;
            }
        }
    </style>
</head>

<body>

<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="<?= BASE_URL ?>admin" class="logo d-flex align-items-center">
            <i class="bi bi-grid-fill"></i>
            <span class="d-none d-lg-block">Admin Panel</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn" onclick="document.body.classList.toggle('toggle-sidebar')" style="font-size: 32px; cursor: pointer; color: #012970; padding-left: 10px;"></i>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="<?= BASE_URL ?>assets/img/team/team-1.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">
                        <?= Session::get('nama') ?? Session::get('username') ?>
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= Session::get('nama') ?? Session::get('username') ?></h6>
                        <span class="d-flex align-items-center justify-content-center">
                            <i class="bi bi-person-badge me-2" style="font-size: 16px;"></i> 
                            <?= ucfirst(Session::get('level')) ?>
                        </span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= BASE_URL ?>admin/profil">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= BASE_URL ?>admin/changePassword">
                            <i class="bi bi-key"></i>
                            <span>Ganti Password</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= BASE_URL ?>auth/logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?= (isset($data['title']) && $data['title'] == 'Dashboard Admin') ? '' : 'collapsed' ?>" href="<?= BASE_URL ?>admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (isset($data['title']) && $data['title'] == 'Kelola Profil Lab') ? '' : 'collapsed' ?>" href="<?= BASE_URL ?>admin/profil">
                <i class="bi bi-person-lines-fill"></i>
                <span>Profil & Visi Misi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (isset($data['title']) && strpos($data['title'], 'Berita') !== false) ? '' : 'collapsed' ?>" href="<?= BASE_URL ?>admin/berita">
                <i class="bi bi-newspaper"></i>
                <span>Berita</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (isset($data['title']) && strpos($data['title'], 'Fasilitas') !== false) ? '' : 'collapsed' ?>" href="<?= BASE_URL ?>admin/fasilitas">
                <i class="bi bi-hdd-network"></i>
                <span>Fasilitas</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (isset($data['title']) && strpos($data['title'], 'Anggota Lab') !== false) ? '' : 'collapsed' ?>" href="<?= BASE_URL ?>admin/team">
                <i class="bi bi-people-fill"></i>
                <span>Anggota Lab</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (isset($data['title']) && strpos($data['title'], 'Publikasi') !== false) ? '' : 'collapsed' ?>" href="<?= BASE_URL ?>admin/publikasi">
                <i class="bi bi-journal-text"></i>
                <span>Publikasi Jurnal</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= (isset($data['title']) && strpos($data['title'], 'Mata Kuliah') !== false) ? '' : 'collapsed' ?>" href="<?= BASE_URL ?>admin/matakuliah">
                <i class="bi bi-book"></i>
                <span>Mata Kuliah</span>
            </a>
        </li>

        <li class="nav-heading">Settings</li>

        <li class="nav-item">
            <a class="nav-link <?= (isset($data['title']) && $data['title'] == 'Ganti Password') ? '' : 'collapsed' ?>" href="<?= BASE_URL ?>admin/changePassword">
                <i class="bi bi-key"></i>
                <span>Ganti Password</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= BASE_URL ?>auth/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>

<main id="main" class="main">
    
    <?php 
    $flash = Session::getFlash();
    if ($flash): 
    ?>
        <div class="alert alert-<?= $flash['type'] === 'success' ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
            <?= $flash['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>