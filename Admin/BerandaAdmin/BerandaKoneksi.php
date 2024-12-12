<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti sesuai dengan username MySQL Anda
$password = ""; // Ganti sesuai dengan password MySQL Anda
$dbname = "wadi_borneo";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data
$sql = "SELECT Deskripsi, Gambar FROM Beranda LIMIT 1";
$result = $conn->query($sql);

// Ambil data jika ada
$deskripsi = "";
$gambar = "";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $deskripsi = $row['Deskripsi'];
    $gambar = $row['Gambar'];
}

$conn->close();
?>
