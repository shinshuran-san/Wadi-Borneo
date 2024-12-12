<?php
include 'update_stock.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Produk</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="Tabel.css">
    
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

<div class="faq-container">
        <!-- Daftar Tabel Kategori -->
        <div class="faq-category">
            <div class="faq-header">
                <h2>Daftar Tabel Kategori</h2>
                
            </div>
            <ul id="table-list" class="faq-list">
            <?php foreach ($tableList as $category): ?>
                <li class="faq-item table-item" data-table="<?= htmlspecialchars($category['jenis_kategori']) ?>">
                    <?= htmlspecialchars($category['jenis_kategori']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
        </div>

        <!-- Data Tabel -->
        <div class="faq-data">
            <div class="faq-header">
                <h2>Data Tabel</h2>
                <button id="save-button" class="save-button">Simpan</button>
            </div>
            <div id="table-data">
                <ul id="product-list" class="faq-list">
                    <li class="faq-item">Silakan pilih tabel dari daftar kategori.</li>
                </ul>
            </div>
        </div>
    </div>

<?php include '../bawaha.php'; ?>


<script src="Tabel.js"></script>

</body>
</html>
