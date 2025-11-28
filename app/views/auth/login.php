<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Login' ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/login.css">
    
    <style>
        /* CSS Internal untuk memastikan overlay benar */
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

        /* Overlay Dark Navy (Sesuai Home Page) */
        body::before {
            content: '';
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 9, 16, 0.7); 
            z-index: 0;
        }

        .login-container {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 440px;
            padding: 50px 40px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: fadeIn 0.5s ease;
        }

        /* GARIS BIRU SUDAH DIHAPUS DARI SINI */

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .logo-container { text-align: center; margin-bottom: 35px; }
        
        /* Logo Bulat Biru */
        .logo {
            width: 70px; height: 70px;
            background: linear-gradient(135deg, #1977cc 0%, #2c4964 100%);
            border-radius: 50%;
            display: inline-flex; align-items: center; justify-content: center;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(25, 119, 204, 0.4);
        }
        .logo svg { width: 40px; height: 40px; stroke: white; stroke-width: 2; fill: none; }

        h1 { font-size: 28px; color: #2d3748; font-weight: 700; margin-bottom: 8px; }
        .subtitle { color: #718096; font-size: 15px; font-weight: 400; }

        .alert { padding: 12px 15px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error, .alert-danger { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

        .form-group { margin-bottom: 24px; }
        label { display: block; color: #4a5568; font-size: 14px; font-weight: 500; margin-bottom: 8px; }

        input[type="text"], input[type="password"] {
            width: 100%; padding: 14px 16px;
            border: 2px solid #e2e8f0; border-radius: 10px;
            font-size: 15px; color: #2d3748;
            transition: all 0.3s ease; background: #ffffff;
        }
        input:focus { outline: none; border-color: #1977cc; box-shadow: 0 0 0 3px rgba(25, 119, 204, 0.1); }

        .login-btn {
            width: 100%; padding: 14px;
            background: linear-gradient(135deg, #1977cc 0%, #2c4964 100%);
            color: white; border: none; border-radius: 10px;
            font-size: 16px; font-weight: 600; cursor: pointer;
            transition: all 0.3s ease; margin-top: 10px;
            box-shadow: 0 4px 15px rgba(25, 119, 204, 0.4);
        }
        .login-btn:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(25, 119, 204, 0.5); }

        .footer-links {
            display: flex; justify-content: space-between; margin-top: 20px; font-size: 14px;
        }
        .footer-links a { color: #1977cc; text-decoration: none; transition: 0.3s; }
        .footer-links a:hover { color: #2c4964; text-decoration: underline; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <div class="logo">
                <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M4 20c0-4 3.5-7 8-7s8 3 8 7"/>
                </svg>
            </div>
            <h1>Login</h1>
            <p class="subtitle">Welcome Back to Admin</p>
        </div>

        <?php $flash = Session::getFlash(); if ($flash): ?>
            <div class="alert alert-<?= $flash['type'] ?>">
                <?= $flash['message'] ?>
            </div>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>auth/processLogin" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>
        
        <div class="footer-links">
            <a href="<?= BASE_URL ?>">← Kembali ke Beranda</a>
            
            <a href="<?= BASE_URL ?>auth/changePassword">Ganti Password?</a>
        </div>
    </div>
</body>
</html>