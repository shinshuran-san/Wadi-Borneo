<?php

include '../koneksi.php';

$id_produk = isset($_GET['id']) ? $_GET['id'] : 0;

// Query untuk mengambil data produk berdasarkan ID
$sql = "SELECT id_produk, id_kategori, nama_produk, harga, deskripsi, stok, gambar FROM produk WHERE id_produk = $id_produk";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "<script>alert('Produk tidak ditemukan!'); window.location.href = '../Katagori_Admin/katagori_admin.php';</script>";
    exit;
}

// Query untuk mengambil semua kategori
$sql_kategori = "SELECT id_kategori, jenis_kategori FROM kategori";
$result_kategori = $conn->query($sql_kategori);

$kategoriList = [];
if ($result_kategori->num_rows > 0) {
    while ($kategori = $result_kategori->fetch_assoc()) {
        $kategoriList[] = $kategori;
    }
}

?>
