<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="<?= BASE_URL ?>admin" class="logo d-flex align-items-center">
            <img src="<?= BASE_URL ?>assets/img/logoDT.png" alt="">
            <span class="d-none d-lg-block">Admin Panel</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="<?= BASE_URL ?>assets/img/profile-default.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">
                        <?= Session::get('nama') ?? Session::get('username') ?>
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= Session::get('username') ?></h6>
                        <span><?= ucfirst(Session::get('level')) ?></span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= BASE_URL ?>admin/module/profile">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= BASE_URL ?>admin/changePassword">
                            <i class="bi bi-key"></i>
                            <span>Change Password</span>
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
            <a class="nav-link <?= ($data['title'] ?? '') === 'Dashboard Admin' ? '' : 'collapsed' ?>" href="<?= BASE_URL ?>admin">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= BASE_URL ?>admin/module/users">
                <i class="bi bi-people"></i>
                <span>Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= BASE_URL ?>admin/module/services">
                <i class="bi bi-briefcase"></i>
                <span>Services</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= BASE_URL ?>admin/module/portfolio">
                <i class="bi bi-image"></i>
                <span>Portfolio</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= BASE_URL ?>admin/module/team">
                <i class="bi bi-person-badge"></i>
                <span>Team</span>
            </a>
        </li>

        <li class="nav-heading">Settings</li>

        <li class="nav-item">
            <a class="nav-link <?= ($data['title'] ?? '') === 'Ganti Password' ? '' : 'collapsed' ?>" href="<?= BASE_URL ?>admin/changePassword">
                <i class="bi bi-key"></i>
                <span>Change Password</span>
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