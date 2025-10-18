<?php
// Di bagian atas connection.php, sebelum koneksi database
if (session_status() == PHP_SESSION_NONE) {
    session_name('PHPSESSID');
    session_set_cookie_params([
        'lifetime' => 86400, // 24 jam
        'path' => '/',
        'domain' => '',
        'secure' => false,
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    session_start();
}

$host = "localhost";
$username = "root";
$password = "";
$database = "stylezone_db";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>