<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Testing Routing System</h2>";

// Test 1: Check .htaccess
echo "<h3>1. Check .htaccess</h3>";
if (file_exists('.htaccess')) {
    echo "✅ .htaccess exists<br>";
    echo "<pre>" . htmlspecialchars(file_get_contents('.htaccess')) . "</pre>";
} else {
    echo "❌ .htaccess NOT FOUND!<br>";
}

// Test 2: Check mod_rewrite
echo "<h3>2. Check mod_rewrite</h3>";
if (function_exists('apache_get_modules')) {
    $modules = apache_get_modules();
    if (in_array('mod_rewrite', $modules)) {
        echo "✅ mod_rewrite is enabled<br>";
    } else {
        echo "❌ mod_rewrite is NOT enabled!<br>";
    }
} else {
    echo "⚠️ Cannot check mod_rewrite (not Apache or CGI mode)<br>";
}

// Test 3: Check URL parsing
echo "<h3>3. Check URL Parsing</h3>";
echo "REQUEST_URI: " . ($_SERVER['REQUEST_URI'] ?? 'not set') . "<br>";
echo "QUERY_STRING: " . ($_SERVER['QUERY_STRING'] ?? 'not set') . "<br>";
echo "GET url: " . ($_GET['url'] ?? 'not set') . "<br>";

// Test 4: Check controllers
echo "<h3>4. Check Controllers</h3>";
$controllers = ['HomeController', 'AuthController', 'AdminController'];
foreach ($controllers as $ctrl) {
    $path = "../app/controllers/{$ctrl}.php";
    if (file_exists($path)) {
        echo "✅ {$ctrl}.php exists<br>";
    } else {
        echo "❌ {$ctrl}.php NOT FOUND!<br>";
    }
}

// Test 5: Test links
echo "<h3>5. Test Links</h3>";
echo '<a href="' . $_SERVER['PHP_SELF'] . '?url=auth/login">Test: auth/login</a><br>';
echo '<a href="index.php?url=auth/login">Test: index.php?url=auth/login</a><br>';
?>