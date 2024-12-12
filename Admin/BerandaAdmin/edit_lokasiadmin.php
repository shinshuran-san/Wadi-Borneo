<?php
include 'edit_lokasi.php'; // Menyertakan file yang menangani proses edit
include '../../Katagori/koneksi.php'; // Sesuaikan jalur koneksi database Anda

// Ambil data alamat dan email dari database
$sql_lokasi = "SELECT alamat, email FROM tbl_users LIMIT 1"; 
$result_lokasi = $conn->query($sql_lokasi);
$email = '';
$alamat = '';

if ($result_lokasi->num_rows > 0) {
    $row_lokasi = $result_lokasi->fetch_assoc();
    $email = $row_lokasi['email'];
    $alamat = $row_lokasi['alamat'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kontak - Wadi Borneo</title>
    <link rel="stylesheet" href="../../Katagori/katagori.css">
    <link rel="stylesheet" href="../../style.css">
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
        <h2>Edit Kontak</h2>
        <form action="edit_lokasi.php" method="POST">
            <!-- Form untuk mengedit alamat -->

            <label for="alamat">Alamat:</label>
            <textarea name="alamat" id="alamat" rows="4" required><?php echo htmlspecialchars($alamat); ?></textarea>

            <button type="submit" class="btn-tambah">Update Kontak</button>
        </form>
        <a href="kontak_admin.php" class="back-link">Kembali</a>
    </div>
</div>

<?php include '../../bawaha.php'; ?>

</body>
</html>
