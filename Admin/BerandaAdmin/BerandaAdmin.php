<?php

include '../CekSesi.php';
include 'BerandaKoneksi.php';
include '../../Katagori/koneksi.php';

$sql_lokasi = "SELECT alamat, email FROM tbl_users LIMIT 1"; 
$result_lokasi = $conn->query($sql_lokasi);

$alamat = '';  
$email = '';   

if ($result_lokasi->num_rows > 0) {
    $row_lokasi = $result_lokasi->fetch_assoc();
    $alamat = $row_lokasi['alamat'];  
    $email = $row_lokasi['email'];    
}

$conn->close(); 
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadi Borneo Palangka Raya</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="../../Katagori/katagori.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>WADI BORNEO</h1>
        </div>
        <nav>
            <a href="EditBeranda.php">🖋 EDIT</a>
            <a href="#">BERANDA</a>
            <a href="/Katagori/Katagori_Admin/katagori_admin.php">KATEGORI</a>  
            <a href="/Kontak/KontakAdmin.php">KONTAK</a>
            <a href="/Admin/ProfilAdmin/ProfilAdmin.php">PROFIL</a>
        </nav>
    </header>

    <main>
        <section class="banner">
            <img src="/Gambar/menu.jpg" alt="Banner Wadi Borneo">
        </section>

        <section class="content">
            <div class="text-content">
                <h2>WADI BORNEO PALANGKA RAYA</h2>
                <h3>Selamat Data di Website Wadi Borneo<br> Palangaka Raya</h3>
                <p id="description"><?php echo $deskripsi; ?></p>
                <h4><strong>Pemilik/owner Wadi Borneo Palangka Raya<br><br>Yessy Taras Tuty</strong></h4>
            </div>
                <div class="product-list">
                <img id="image" src="/Gambar/<?php echo $gambar; ?>" alt="Foto Pemilik">
                </div>
            
    </section>
    </main>
    <section class="contact" style="background-image: url('../../Gambar/INDO.png'); background-size: cover; background-position: center; padding: 20px; color: rgb(255, 255, 255);">
    <h3>Alamat Kami</h3>
    <p><a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a></p>
    <p><?php echo nl2br(htmlspecialchars($alamat)); ?></p> <!-- Menampilkan lokasi alamat -->
    <h4>-</h4>

    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126957.0869153016!2d113.8730017328367!3d-2.2071987274394614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dfcb252b68138d9%3A0x2ef44f82762f8038!2sJl.+Cakra+Buana+No.299%2C+Palangka%2C+Kota+Palangka+Raya%2C+Kalimantan+Tengah+74874%2C+Indonesia!5e0!3m2!1sen!2sid!4v1698178901234" allowfullscreen></iframe>
    </div>

    <a href="edit_lokasiadmin.php" class="btn-tambah">Edit Alamat</a>
    </section>

    <script src="BerandaAdmin.js"></script>


    

</body>
</html>