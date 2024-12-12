<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadi Borneo Login</title>
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
            <a href="/Index.php" style="font-size: 20px;">↩️ KEMBALI</a>
            
        </nav>
    </header>



<div class="posisi">

        <!-- Left section -->
        <div class="left-section">
            <h1>WADI BORNEO</h1>
            <p>Tempat Belanja Wadi Nomor 1 di Palangka Raya</p>
        </div>

    <div class="input">
        <h1>LOGIN</h1>
        <form action="login.php" method="POST">
            <div class="box-input">
                <i class="fas fa-envelope-open-text"></i>
                <input type="text" name="email" placeholder="Email">
            </div>
            <div class="box-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password">
            </div>
            <a href="/Admin/BerandaAdmin/BerandaAdmin.php">
                <button type="submit" name="login" class="btn-input">Login</button>
            </a>
            <div class="bottom">
                <p>Lupa Password?
                    <a href="MissPass.php">Klik Disini</a>
                </p>
            </div>
        </form>
    </div>
</div>

<?php include '../bawaha.php'; ?>

<script src="Login.js"></script>


    
</body>
</html>