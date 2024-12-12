<?php
session_start();
include('koneksi.php'); // Pastikan file koneksi.php sudah disertakan untuk koneksi ke database

// Cek apakah pengguna sudah login dan ada email di sesi
if (!isset($_SESSION['email'])) {
    echo "Sesi tidak valid. Anda harus login terlebih dahulu.";
    header("Location: logins.php");
    exit();
}

// Ambil email dari sesi
$email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Periksa apakah password baru dan konfirmasi password cocok
    if ($new_password === $confirm_password) {
        // Update password di database tanpa enkripsi
        $query = "UPDATE tbl_users SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $new_password, $email);
        
        if ($stmt->execute()) {
            echo "Password berhasil diperbarui!";
            // Redirect ke halaman login setelah berhasil
            unset($_SESSION['email']);
            header("Location: logins.php");
            exit();
        } else {
            echo "Terjadi kesalahan saat memperbarui password.";
        }
    } else {
        echo "Password baru dan konfirmasi password tidak cocok.";
    }
} else {
    echo "Metode permintaan tidak valid.";
}
?>
