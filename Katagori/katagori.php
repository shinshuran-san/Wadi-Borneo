<?php
include 'Katagori_Data.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadi Borneo - Kategori</title>
    <link rel="stylesheet" href="katagori.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/bawah.css">
</head>
<body>
<header>
        <div class="logo">
            <h1>WADI BORNEO</h1>
        </div>
        <nav>
            <a href="/Index.php">BERANDA</a>
            <a href="#">KATEGORI</a>  
            <a href="/Kontak/Kontak.php">KONTAK</a>  
            
        </nav>
    </header>

    <div class="main-container">
        <div class="main-sidebar">
            <h3>KATEGORI</h3>
               <ul>
                <?php
                  if ($result_kategori->num_rows > 0) {
                    while ($row = $result_kategori->fetch_assoc()) {
                    echo '<li><a href="?id_kategori=' . $row['id_kategori'] . '">ikan ' . $row['jenis_kategori'] . '</a></li>';
                   }
                  } else {
                   echo "<li>Tidak ada kategori ditemukan.</li>";
               }
            ?>
          </ul>
         </div>

        <div class="main-content">
        <h2>
            <?php
            // Cari nama kategori berdasarkan id_kategori
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
                    echo '</div>';
                    echo '<button onclick="window.location.href=\'Detail_Produk/detail_barang.php?id=' . $row['id_produk'] . '\'">BACA INFORMASI</button>';
                    echo '</div>';
                }
            } else {
                echo "<h2>Tidak ada produk.</h2>";
            }
            ?>
          </div>
        </div>
     </div>

    <?php include '../bawah.php'; ?>

</body>
</html>

