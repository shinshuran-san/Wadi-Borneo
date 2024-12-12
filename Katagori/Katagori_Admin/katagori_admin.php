<?php

include '../../Admin/CekSesi.php';
include '../Katagori_Data.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadi Borneo - Kategori</title>
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
            <a href="#">KATEGORI</a>  
            <a href="/Kontak/KontakAdmin.php">KONTAK</a>
            <a href="/Admin/ProfilAdmin/ProfilAdmin.php">PROFIL</a>
        </nav>
</header>

<div class="main-container">
    <div class="main-sidebar">
        <h3>KATEGORI</h3>
        <ul>
            <?php
            if ($result_kategori->num_rows > 0) {
                while ($row = $result_kategori->fetch_assoc()) {
                    echo '<li style="display: flex; justify-content: space-between; align-items: center;">';
                    echo '<a href="?id_kategori=' . $row['id_kategori'] . '">ikan ' . $row['jenis_kategori'] . '</a>';
                    echo '<a href="hapus_ikan.php?id=' . $row['id_kategori'] . '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus produk ini?\')" class="edit-button" title="Hapus Produk">🗑️</a>';
                    echo '</li>';
                }
            } else {
                echo "<li>Tidak ada kategori ditemukan.</li>";
            }
            ?>
        </ul>
        <div class="add-item">
            <a href="tambah_kategori.php">
                <button class="btn-tambah">Tambah Kategori</button>
            </a>
        </div>
    </div>

    <div class="main-content">
        <h2>
            <?php
            $kategori_nama = '';
            if ($result_kategori->num_rows > 0) {
                $result_kategori->data_seek(0); // Reset hasil query
                while ($row = $result_kategori->fetch_assoc()) {
                    if ($row['id_kategori'] == $id_kategori) {
                        $kategori_nama = $row['jenis_kategori'];
                        break;
                    }
                }
            }
            echo strtoupper('ikan ' . $kategori_nama);
            ?>
        </h2>
        <div class="product-grid">
            <?php
            if ($result_produk->num_rows > 0) {
                while ($row = $result_produk->fetch_assoc()) {
                    echo '<div class="product-item">';
                    echo '<img src="' . $row['gambar'] . '" alt="' . $row['nama_produk'] . '">';
                    echo '<div class="product-name">';
                    echo '<h3>' . $row['nama_produk'] . '</h3>';
                    echo '<a href="edit_item.php?id=' . $row['id_produk'] . '" class="edit-button" title="Edit Produk">🖉</a>';
                    echo '<a href="hapus_item.php?id=' . $row['id_produk'] . '" onclick="return confirm(\'Apakah Anda yakin ingin menghapus produk ini?\')" class="edit-button" title="Hapus Produk">🗑️</a>';
                    echo '</div>';
                    echo '<button onclick="window.location.href=\'../Detail_Produk_Admin/detail_barang_admin.php?id=' . $row['id_produk'] . '\'">BACA INFORMASI</button>';
                    echo '</div>';
                }
            } else {
                echo "<h2>Tidak ada produk.</h2>";
            }
            ?>
        </div>
        <div class="add-item">
            <a href="tambah_item.php">
                <button class="btn-tambah">Tambah Produk</button>
            </a>
        </div>
    </div>
</div>

<?php include '../../bawaha.php'; ?>

</body>
</html>
