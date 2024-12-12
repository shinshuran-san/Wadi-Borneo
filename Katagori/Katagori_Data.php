<?php

include 'koneksi.php';

// Mengambil kategori dari URL jika ada, default ke ID kategori 1 (nila)
$id_kategori = isset($_GET['id_kategori']) ? intval($_GET['id_kategori']) : 1;

// Query untuk mendapatkan produk berdasarkan id_kategori
$sql_produk = "SELECT * FROM produk WHERE id_kategori = $id_kategori";
$result_produk = $conn->query($sql_produk);

// Query untuk mendapatkan kategori
$sql_kategori = "SELECT * FROM kategori order by jenis_kategori ASC";
$result_kategori = $conn->query($sql_kategori);

$conn->close();
?>
