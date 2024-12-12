<?php
session_start();
include '../koneksi.php';

if (isset($_SESSION['ID_Admin'])) {
    $session_id = session_id();

    // Hapus sesi dari database
    $delete_session = "DELETE FROM active_sessions WHERE session_id = '$session_id'";
    mysqli_query($conn, $delete_session);

    // Hapus sesi dan cookie
    session_destroy();
    setcookie("session_id", "", time() - 3600, "/");

    header("Location: /Index.php");
    exit();
}
?>
