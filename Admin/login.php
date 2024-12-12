<?php
require 'koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Sanitasi input
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Query database
    $query_sql = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query_sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Set session
        $_SESSION['ID_Admin'] = $user['ID_Admin'];
        $_SESSION['username'] = $user['username'];

        // Simpan sesi ke database
        $session_id = session_id();
        $user_id = $user['ID_Admin'];
        $login_time = date("Y-m-d H:i:s");

        $insert_session = "INSERT INTO active_sessions (session_id, ID_Admin, login_time) 
                           VALUES ('$session_id', '$user_id', '$login_time')";
        mysqli_query($conn, $insert_session);

        // Set cookie untuk menjaga login tetap aktif
        setcookie("session_id", $session_id, time() + (86400 * 7), "/"); // Berlaku 7 hari

        header("Location: /Admin/BerandaAdmin/BerandaAdmin.php");
    } else {
        header("Location: Logins.php?error=1");
        exit();
    }
}
?>
