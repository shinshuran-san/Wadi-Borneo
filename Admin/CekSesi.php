<?php
session_start();
require 'koneksi.php';

// Periksa apakah pengguna telah login
if (!isset($_SESSION['ID_Admin'])) {
    // Jika cookie sesi tersedia, validasi dengan database
    if (isset($_COOKIE['session_id'])) {
        $session_id = $_COOKIE['session_id'];

        // Validasi sesi di database
        $query_session = "SELECT * FROM active_sessions WHERE session_id = '$session_id'";
        $result = mysqli_query($conn, $query_session);

        if (mysqli_num_rows($result) > 0) {
            $session_data = mysqli_fetch_assoc($result);
            $_SESSION['ID_Admin'] = $session_data['ID_Admin'];
        } else {
            // Sesi tidak valid, alihkan ke halaman login
            header("Location: /Index.php");
            exit();
        }
    } else {
        // Jika tidak ada sesi atau cookie, alihkan ke halaman login
        header("Location: /Index.php");
        exit();
    }
}

// Jika sampai di sini, berarti sesi valid
?>
