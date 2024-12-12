<?php
// Mulai sesi
session_start();

// Cek apakah session 'otp_verified' ada dan bernilai true
if (!isset($_SESSION['otp']) || $_SESSION['otp'] !== true) {
    // Jika belum terverifikasi, arahkan ke halaman verify_otp.php
    header("Location: MissPass.php");
    exit(); // pastikan script berhenti eksekusinya
}

// Hapus session otp_verified setelah berhasil mengakses halaman ini
unset($_SESSION['otp']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Email</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/Admin/TampilanLogin.css" media="screen" title="no title">
    <link rel="stylesheet" href="/bawah.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>

    <header>
        <div class="logo">
            <h1>WADI BORNEO</h1>
        </div>
        <nav>
            <a href="table_admin.php" style="font-size: 20px;">↩️ KEMBALI</a>
        </nav>
    </header>

    <div class="posisis">
        <div class="input">
            <form action="change_email.php" method="POST">
                <div class="box-input">
                    <input type="email" name="new_email" placeholder="Masukkan Email Baru" required>
                </div>
                <div class="box-input">
                    <input type="email" name="confirm_email" placeholder="Konfirmasi Email Baru" required>
                </div>
                <button type="submit" class="btn-input">Ubah Email</button>
            </form>
        </div>
    </div>

    <?php include '../../bawaha.php'; ?>

</body>
</html>
