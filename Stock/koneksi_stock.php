<?php

// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "wadi_borneo";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
