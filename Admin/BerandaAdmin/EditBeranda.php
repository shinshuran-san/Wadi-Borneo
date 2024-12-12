<?php
     require 'BerandaEditKoneksi.php';
     include '../CekSesi.php';
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Beranda</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/Admin/KontakAdmin/EditKontak.css">
    <link rel="stylesheet" href="/bawah.css">
</head>
<body>

<header>
        <div class="logo">
            <h1>WADI BORNEO</h1>
        </div>
        <nav>
            <a href="EditBeranda.php">🖋️ EDIT</a>
            <a href="BerandaAdmin.php">BERANDA</a>
            <a href="/Katagori/Katagori_Admin/katagori_admin.php">KATEGORI</a>  
            <a href="/Kontak/KontakAdmin.php">KONTAK</a>
            <a href="/Admin/ProfilAdmin/ProfilAdmin.php">PROFIL</a>
        </nav>
    </header>

    <div class="user-game-id">
    <div class="faq-header">
    <h2>EDIT HALAMAN BERANDA</h2>
    <button type="submit" id="saveButton" class="save-button">SIMPAN</button>
    </div>
    <!-- Form untuk menampilkan dan mengubah data -->
    <form action="" method="POST">
    <label for="Deskripsi">DESKRIPSI</label>
            <input type="text" id="Deskripsi" name="Deskripsi" value="<?php echo htmlspecialchars($Deskripsi); ?>" placeholder="Masukan Deskirpsi">

            
        </form>
        <p>Di Ingatkan untuk tidak mengubah Deskirpsi Beranda secara sembarangan</p>
</div>

<?php include '../../bawah.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="BerandaEdit.js"></script>
    

</body>
</html>
