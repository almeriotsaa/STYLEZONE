<?php
$host = "localhost";   // biasanya 'localhost'
$user = "root";        // username default di XAMPP
$pass = "";            // password default kosong
$db   = "stylezone_db";     // nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
