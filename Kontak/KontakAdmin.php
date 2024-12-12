<?php
require 'KontakData.php';
include '../Admin/CekSesi.php';
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadi Borneo - Kontak</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="Kontak.css">
    <link rel="stylesheet" href="/bawah.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>WADI BORNEO</h1>
        </div>
        <nav>
            <a href="/Admin/KontakAdmin/EditKontak.php">🖋️ EDIT KONTAK SAYA</a>
            <a href="/Admin/BerandaAdmin/BerandaAdmin.php">BERANDA</a>
            <a href="/Katagori/Katagori_Admin/katagori_admin.php">KATEGORI</a>
            <div class="dropdown" id="dropdown">
            <a href="#" class="dropdown-toggle">LIST KONTAK</a>
            <div class="dropdown-menu" id="adminDropdown">
                    <?php foreach ($admins as $admin): ?>
                        <a href="#" class="admin-item" data-id="<?php echo $admin['ID_Admin']; ?>">
                            <?php echo $admin['username']; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <a href="/Admin/ProfilAdmin/ProfilAdmin.php">PROFIL</a>
        </nav>
    </header>

    <div class="container">
        <h1>Say Hello</h1>
        <div class="contact-info">
            <div class="info">

                <p><span class="info-text">Contact Information</span></p>
                <p><a href="https://wa.me/<?php echo $row['No_Telpon']; ?>" id="phone" target="_blank">Hubungi via WhatsApp</a></p>
                <p><a href="https://instagram.com/<?php echo $row['IG']; ?>" id="ig" target="_blank">Follow Instagram</a></p>
                <p><a href="mailto:<?php echo $row['Email_Borneo']; ?>" id="email">Hubungi via Email</a></p>

            </div>
            <div class="opening-hours">
                <div class="shadow-box"></div>
                <div class="hours-box">
                    <p>Open Daily</p>
                    <p><span class="hours-text">07:00 - 21:00</span></p>
                </div>
            </div>
        </div>
    </div>

    <?php include '../bawaha.php'; ?>

    <script src="droopmenu.js"></script>
    <script src="KontakJS.js"></script>

    
</body>
</html>
