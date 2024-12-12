<?php

include '../../Admin/CekSesi.php';

include 'edit_data.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="../katagori.css">
    <link rel="stylesheet" href="table_admin.css">
    
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

    <div class="main-container">
        <div class="form-container">
            <h2>Edit Data</h2>
            <form action="" method="post">

                <label for="password_input">Masukkan Password <?php echo '<a>' . htmlspecialchars($data['username']) . '</a>'; ?></label>
                <input type="password" name="password_input" id="password_input" value="" required>
                <span id="togglePassword"></span>


                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($data['username']); ?>" required>

                <label for="no_telpon">No Telepon</label>
                <input type="text" name="no_telpon" id="no_telpon" value="<?php echo htmlspecialchars($data['No_Telpon']); ?>" required>

                <label for="instagram">Instagram</label>
                <input type="text" name="instagram" id="instagram" value="<?php echo htmlspecialchars($data['IG']); ?>">

                <label for="email_borneo">Email Borneo</label>
                <input type="email" name="email_borneo" id="email_borneo" value="<?php echo htmlspecialchars($data['Email_Borneo']); ?>">

                <button type="submit" class="btn-tambahs">Simpan Perubahan</button>
            </form>
            <a href="table_admin.php" class="back-link">Kembali</a>
        </div>
    </div>

    <?php include '../../bawaha.php'; ?>

    <script src="edit.js"></script>

</body>
</html>
