<?php 
include 'Detail_Data.php';

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadi Borneo Palangka Raya</title>
    <link rel="stylesheet" href="DetailBarang.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/bawah.css">
</head>
<body>
<header>
        <div class="logo">
            <h1>WADI BORNEO</h1>
        </div>
        <nav>
            <a href="#">BERANDA</a>
            <a href="#">KATEGORI</a>  
            <a href="/Kontak/Kontak.php">KONTAK</a>  
            
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
        <br>
        <p>Silahkan Hubungin Admin Di Kontak Jika ingin Membeli Product</p>
        <a href="../katagori.php">Kembali</a>
            </div>
        </div>
    </main>
    
    <?php include '../../bawah.php'; ?>
</body>
</html>
