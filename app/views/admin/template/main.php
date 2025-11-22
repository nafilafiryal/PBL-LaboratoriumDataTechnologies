<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $title ?? APP_NAME ?></title>
    
    <!-- Vendor CSS -->
    <link href="<?= BASE_URL ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Main CSS -->
    <link href="<?= BASE_URL ?>assets/css/main.css" rel="stylesheet">
</head>

<body>
    <?php include 'header.php'; ?>
    
    <main id="main" class="main">
        <?php 
        // Flash message
        $flash = Session::getFlash();
        if ($flash): 
        ?>
            <div class="alert alert-<?= $flash['type'] === 'success' ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
                <?= $flash['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php 
        // Load module berdasarkan page
        if (isset($page) && $page !== 'dashboard') {
            $modulePath = '../app/views/admin/module/' . $page . '/index.php';
            if (file_exists($modulePath)) {
                include $modulePath;
            } else {
                include 'home.php';
            }
        } else {
            include 'home.php';
        }
        ?>
    </main>
    
    <?php include 'footer.php'; ?>
    
    <!-- Vendor JS -->
    <script src="<?= BASE_URL ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Main JS -->
    <script src="<?= BASE_URL ?>assets/js/main.js"></script>
</body>
</html>