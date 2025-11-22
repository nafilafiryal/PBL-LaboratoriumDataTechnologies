<?php
// BASE_URL harus dengan trailing slash
define('BASE_URL', 'http://localhost/PBL-LaboratoriumDataTechnologies/public/');

// Atau gunakan ini untuk auto-detect
// define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/PBL-LaboratoriumDataTechnologies/public/');

define('BASE_PATH', __DIR__ . '/../');
define('APP_NAME', 'Laboratorium Data Teknologi');
date_default_timezone_set('Asia/Jakarta');
define('SESSION_TIMEOUT', 3600);
define('LEVEL_ADMIN', 'admin');
define('LEVEL_USER', 'user');
