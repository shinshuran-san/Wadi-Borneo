<?php
session_start();
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="TampilanLogin.css" media="screen" title="no title">
    <link rel="stylesheet" href="/bawah.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    
</head>
<body>

    <header>
        <div class="logo">
            <h1>WADI BORNEO</h1>
        </div>
        <nav>
            <a href="logins.php" style="font-size: 20px;">↩️ KEMBALI</a>
            
        </nav>
    </header>

    <div class="posisis">

        
    <div class="input">
        <form action="send_otp.php" method="POST">
            <div class="box-input">
            <input type="email" name="email" placeholder="Masukkan Email" value="<?php echo htmlspecialchars($email); ?>" required>
                <button type="submit" class="btn-input" >Kirim Kode OTP</button>
            </div>
        </form>

        <form action="verify_otp.php" method="POST">
            <div class="box-input">
                <input type="text" name="otp" placeholder="Masukkan OTP" required>
                <button type="submit" class="btn-input" >Verifikasi OTP</button>
            </div>
        </form>
    </div>
    </div>

    <?php include '../bawaha.php'; ?>

</body>
</html>
