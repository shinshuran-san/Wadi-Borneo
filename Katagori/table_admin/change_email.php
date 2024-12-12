<?php
session_start();
include('../koneksi.php'); // Pastikan file koneksi.php sudah disertakan untuk koneksi ke database

// Cek apakah pengguna sudah login dan ada email di sesi
if (!isset($_SESSION['email'])) {
    echo "Sesi tidak valid. Anda harus login terlebih dahulu.";
    header("Location: logins.php");
    exit();
}

// Ambil email dari sesi
$email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_email = $_POST['new_email'];
    $confirm_email = $_POST['confirm_email'];

    // Periksa apakah email baru dan konfirmasi email cocok
    if ($new_email === $confirm_email) {
        // Update email di database
        $query = "UPDATE tbl_users SET email = ? WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $new_email, $email);

        if ($stmt->execute()) {
            // Update email di sesi
            $_SESSION['email'] = $new_email;
            echo "Email berhasil diperbarui!";
            // Redirect ke halaman profil atau halaman lainnya
            header("Location: table_admin.php");
            exit();
        } else {
            echo "Terjadi kesalahan saat memperbarui email.";
        }
    } else {
        echo "Email baru dan konfirmasi email tidak cocok.";
    }
} else {
    echo "Metode permintaan tidak valid.";
}
?>
