<?php
     
     require 'ProfilAdminData.php';
     
     include '../../Kontak/KontakData.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Akun Admin</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="ProfilAdmin.css">
    <link rel="stylesheet" href="/bawah.css">
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
            <a href="#">PROFIL</a>
        </nav>
    </header>

    <div class="posisi">
    <div class="sidebar">
        <ul>
            <li><a href="/Katagori/table_admin/table_admin.php"><span class="icon">👤</span> Admin </a></li>
            <li><a href="/Stock/ProductTabel.php"><span class="icon">📦</span> Stock produk Wadi </a></li>
            <li><a href="/Admin/KontakAdmin/EditKontak.php"><span class="icon">📝</span> Contact Information </a></li>
            <li><span class="icon">↩️</span> Log Out</li>
            
        </ul>  
        <div id="responseMessage"></div>

    </div>
    <div class="containers">
        <h2>AKUN ADMIN</h2>
        
        
        <div class="data-akun-box">
            <div class="data-akun">
                <div class="profile-pic">
                <label for="gambar" class="photo-icon">
               <img src="<?= isset($gambar) && !empty($gambar) ? $gambar : 'https://via.placeholder.com/80'; ?>" alt="Profile Picture" id="previewImage">
               </label>
               <!-- Input file yang disembunyikan -->
               <input type="file" name="gambar" id="gambar" accept="image/*" style="display: none;">
                    
                </div>
                
                
                  <div class="form">
                  <label>Nama Lengkap</label>
                  <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username); ?>" required>

                  <label>Nomor Telepon</label>
                  <input type="text" name="no_telpon" id="no_telpon" value="<?php echo htmlspecialchars($no_telpon); ?>" required>

                  <label>Alamat E-mail</label>
                  <p><?php echo htmlspecialchars($email); ?></p>
                  </div>
            </div>
        </div>
        <div class="buttons">
            <button class="back-button" onclick="window.location.href='/Admin/MissPass.php';">Ganti Password</button>

            <button type="button" id="saveButton" class="save-button">Simpan</button>
        </div>
        
    </div>

</div>

<?php include '../../bawaha.php'; ?>

    <script src="/Kontak/droopmenu.js"></script>
    <script src="ProfilDataAdmin.js"></script>
    <script src="/Kontak/KontakMenu.js"></script>
    <script src="logout.js"></script>

</body>
</html>
