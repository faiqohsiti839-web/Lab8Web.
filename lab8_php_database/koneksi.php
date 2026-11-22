<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "latihan1";

// PHP 8.1+ melempar exception saat koneksi gagal, jadi dibungkus try/catch
mysqli_report(MYSQLI_REPORT_OFF);
$conn = @mysqli_connect($host, $user, $pass, $db);
if ($conn == false)
{
    echo "Koneksi ke server gagal.";
    die();
} #else echo "Koneksi berhasil";
?>
