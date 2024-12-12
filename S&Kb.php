<?php
include 'Katagori/koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat dan Ketentuan</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/ProfilAdmin.css">
    <link rel="stylesheet" href="/bawah.css">
    <link rel="stylesheet" href="Katagori/katagori.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
<body>
    <div class="border">     
        <h2>Syarat dan Ketentuan</h2>
        <?php

        // Query untuk mengambil kolom 'syarat' dari tabel 'beranda'
        $query = "SELECT syarat FROM beranda LIMIT 1";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // Menampilkan data dari kolom 'syarat'
            $row = $result->fetch_assoc();
            echo "<p>" . nl2br(htmlspecialchars($row['syarat'])) . "</p>";
        } else {
            echo "<p>Syarat dan ketentuan belum tersedia.</p>";
        }

        // Tutup koneksi database
        $conn->close();
        ?>
        <div class="add-item">
            <a href="editsyarat.php">
                <button class="btn-tambah">Edit</button>
            </a>
        </div>
    </div>
    
<?php include 'bawah.php'; ?>
</body>
</html>
