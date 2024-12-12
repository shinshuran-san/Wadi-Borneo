<?php

include '../../Admin/CekSesi.php';

include '../koneksi.php'; 

// Query untuk mengambil daftar kategori
$sql_kategori = "SELECT id_kategori, jenis_kategori FROM kategori";
$result_kategori = $conn->query($sql_kategori);





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadi Borneo - Tambah Produk</title>
    <link rel="stylesheet" href="../katagori.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/bawah.css">
</head>
<body>
<header>
        <div class="logo">
            <h1>WADI BORNEO</h1>
        </div>
        <nav>
        <a href="/Admin/BerandaAdmin/BerandaAdmin.php">BERANDA</a>
            <a href="/Katagori/Katagori_Admin/katagori_admin.php">KATEGORI</a>  
            <a href="/Kontak/KontakAdmin.php">KONTAK</a>
            <a href="/Admin/ProfilAdmin/ProfilAdmin.php">PROFIL</a>
        </nav>
    </header>
    
    <div class="main-content">
        <div class="form-container">
            <h2>Tambah Produk Baru</h2>
            <form action="../Script_PHP/tambah_produk.php" method="POST" enctype="multipart/form-data">
                <label for="gambar">Gambar:</label>
                <input type="file" name="gambar" id="gambar" accept="image/*" required>

                <!-- Preview Gambar -->
                <img id="imagePreview" src="" alt="Preview Gambar">

                <label for="nama_produk">Nama Produk:</label>
                <input type="text" name="nama_produk" id="nama_produk" required>

                <label for="harga">Harga:</label>
                <input type="number" name="harga" id="harga" required>

                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" required></textarea>

                <label for="stok">Stok:</label>
                <input type="number" name="stok" id="stok" required>

                <button type="submit" class="btn-tambah">Tambah Produk</button>
            </form>
            <a href="katagori_admin.php" class="back-link">Kembali</a>
        </div>
    </div>

    <?php include '../../bawaha.php'; ?>

    <script src="PreviewGambar.js"></script>

</body>
</html>
