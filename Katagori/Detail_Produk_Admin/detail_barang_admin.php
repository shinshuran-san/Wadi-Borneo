<?php 

include '../../Admin/CekSesi.php';
include 'Detail_Data_Admin.php';

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="../Detail_Produk/DetailBarang.css">
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

    <main>
    <div class="product-info">
        <div class="image-section">
        <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama_produk']; ?>">
        <div class="info-below">
        <p><strong>Harga:</strong> Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
        <p><strong>Stok:</strong> <?php echo $row['stok']; ?> pcs</p>
            </div>
        </div>
        <div class="details-section">
        <h2><?php echo $row['nama_produk']; ?></h2>
        <p> <?php echo $row['deskripsi']; ?></p>
        <a href="../katagori_Admin/katagori_admin.php">Kembali </a>
            </div>
            <div class="details-sections">
            <a href="edit_deskripsi.php?id=<?php echo $row['id_produk']; ?>" class="edit-button" title="Edit Produk">Edit Deskripsi Produk</a>
            </div>
        </div>
    </main>
    
    <?php include '../../bawaha.php'; ?>
</body>
</html>
