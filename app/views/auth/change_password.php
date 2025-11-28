<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Ganti Password' ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/login.css"> 
    
    <style>
        /* Style Tambahan Khusus Halaman Ini */
        body {
            font-family: 'Open Sans', Arial, sans-serif;
            background-image: url('<?= BASE_URL ?>assets/img/hero-bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
        }
        body::before {
            content: '';
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 9, 16, 0.7); /* Overlay Dark Navy */
            z-index: 0;
        }
        .login-container {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 440px;
            padding: 40px;
        }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 600; color: #444; }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 12px;
            border: 2px solid #e2e8f0; border-radius: 8px;
        }
        .btn-submit {
            width: 100%; padding: 12px;
            background: #1977cc; color: white;
            border: none; border-radius: 8px;
            font-weight: 600; cursor: pointer;
            margin-top: 10px;
        }
        .btn-submit:hover { background: #166ab5; }
        .back-link { text-align: center; margin-top: 20px; }
        .back-link a { color: #1977cc; text-decoration: none; }
        .alert { padding: 10px; border-radius: 5px; margin-bottom: 20px; font-size: 14px; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    </style>
</head>
<body>
    <div class="login-container">
        <div style="text-align: center; margin-bottom: 30px;">
            <h2>Ganti Password</h2>
            <p style="color: #666; font-size: 14px;">Masukkan kredensial lama Anda</p>
        </div>

        <?php 
        $flash = Session::getFlash();
        if ($flash): 
        ?>
            <div class="alert alert-<?= $flash['type'] ?>">
                <?= $flash['message'] ?>
            </div>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>auth/processChangePassword" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username Anda" required>
            </div>

            <div class="form-group">
                <label>Password Lama</label>
                <input type="password" name="old_password" placeholder="Password lama" required>
            </div>

            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="new_password" placeholder="Password baru (min. 6 karakter)" required minlength="6">
            </div>

            <div class="form-group">
                <label>Konfirmasi Password Baru</label>
                <input type="password" name="confirm_password" placeholder="Ulangi password baru" required>
            </div>

            <button type="submit" class="btn-submit">Ubah Password</button>
        </form>
        
        <div class="back-link">
            <a href="<?= BASE_URL ?>auth/login">← Kembali ke Login</a>
        </div>
    </div>
</body>
</html>