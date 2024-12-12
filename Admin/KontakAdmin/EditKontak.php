<?php

require 'EditKontakKoneksi.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Akun Admin</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="EditKontak.css">
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


    <div class="user-game-id">
    <div class="faq-header">
    <h2>CONTACT INFORMATION</h2>
    <button type="submit" id="saveButton" class="save-button">SIMPAN</button>
    </div>
    <!-- Form untuk menampilkan dan mengubah data -->
    <form action="" method="POST">
    <label for="Nomor-Tlp">Nomor Telepon</label>
            <input type="text" id="Nomor-Tlp" name="Nomor_Tlp" value="<?php echo htmlspecialchars($no_telpon); ?>" placeholder="Masukan Nomor Telepon Anda">

            <label for="IG">Instagram</label>
            <input type="text" id="IG" name="IG" value="<?php echo htmlspecialchars($instagram); ?>" placeholder="Masukan IG (Instagram) Anda">

            <label for="Email">Email</label>
            <input type="text" id="Email" name="Email" value="<?php echo htmlspecialchars($email_borneo); ?>" placeholder="Masukan Email Borneo Anda">

            
        </form>
        <p>Di Ingatkan bagi para admin harus mengisi Contact Informasi dengan baik dan benar, ikuti prosedur, dan jangan sungkan untuk bertanya jika ada yang tidak di ketahui</p>
</div>


<?php include '../../bawaha.php'; ?>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="SimpanKontak.js"></script>
    

</body>
</html>
