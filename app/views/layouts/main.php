<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $title ?? APP_NAME ?></title>
    
    <!-- Favicons -->
    <link href="<?= BASE_URL ?>assets/img/favicon1.png" rel="icon">
    <link href="<?= BASE_URL ?>assets/img/apple-touch-icon1.png" rel="apple-touch-icon">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Vendor CSS -->
    <link href="<?= BASE_URL ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    
    <!-- Main CSS -->
    <link href="<?= BASE_URL ?>assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">
    <?php include 'header.php'; ?>
    
    <main class="main">
        <?php include '../app/views/home/index.php'; ?>
    </main>
    
    <?php include 'footer.php'; ?>
    
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
    
    <!-- Preloader -->
    <div id="preloader"></div>
    
    <!-- Vendor JS -->
    <script src="<?= BASE_URL ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/aos/aos.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= BASE_URL ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    
    <!-- Main JS -->
    <script src="<?= BASE_URL ?>assets/js/main.js"></script>
</body>
</html>