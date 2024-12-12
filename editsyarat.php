<?php
include 'Katagori/koneksi.php';

// Query untuk mendapatkan Syarat
$sql_beranda = "SELECT Syarat FROM beranda LIMIT 1"; // Ambil satu data saja
$result_beranda = $conn->query($sql_beranda);

$syarat_value = ''; // Variabel default untuk Syarat

if ($result_beranda && $result_beranda->num_rows > 0) {
    $row = $result_beranda->fetch_assoc();
    $syarat_value = $row['Syarat'];
} else {
    // Jika data tidak ditemukan, beri pesan error (opsional)
    echo "<script>alert('Data Syarat tidak ditemukan.');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadi Borneo - Tambah Produk</title>
    <link rel="stylesheet" href="Katagori/katagori.css">
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
    <div class="form-container ">
        <h2>Edit Syarat dan Ketentuan</h2>
        <form action="Katagori/Script_PHP/edit_S&K.php" method="POST" enctype="multipart/form-data">
        <label for="Syarat">Syarat:</label>
        <textarea name="Syarat" id="Syarat" style="width: 100%; height: 150px;" required><?php echo htmlspecialchars($syarat_value); ?></textarea>

        <button type="submit" class="btn-tambah">Edit Syarat dan Ketentuan</button>
        </form>

        <a href="S&Kb.php" class="back-link">Kembali</a>
    </div>
</div>

<?php include 'bawah.php'; ?>

</body>
</html>
