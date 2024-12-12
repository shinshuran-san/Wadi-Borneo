<?php

include '../../Admin/CekSesi.php';

include '../Katagori_Admin/Edit_Item_Data.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - Wadi Borneo</title>
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
            <h2>Edit Deskripsi</h2>
            <form action="../Script_PHP/edit_desc.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_produk" value="<?php echo $id_produk; ?>">
                <input type="hidden" name="table" value="<?php echo $table; ?>"> 

                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" rows="4" required><?php echo $row['deskripsi']; ?></textarea>

                <button type="submit" class="btn-tambah">Update Deskripsi</button>
            </form>
            <a href="Detail_Barang_Admin.php?id=<?php echo $id_produk; ?>" class="back-link">Kembali</a>
        </div>
    </div>

    <?php include '../../bawaha.php'; ?>

    <script src="PreviewGambar.js"></script>

</body>
</html>
