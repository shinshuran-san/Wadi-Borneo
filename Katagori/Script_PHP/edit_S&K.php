<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Syarat = isset($_POST['Syarat']) ? trim($_POST['Syarat']) : '';
    $ID = 1; // Menggunakan ID = 1 untuk pembaruan syarat

    // Validasi input
    if (empty($Syarat)) {
        echo "<script>alert('Syarat tidak boleh kosong.'); window.location.href = '/S&Kb.php';</script>";
        exit();
    }

    // Query untuk memperbarui data Syarat pada ID = 1
    $sql = "UPDATE beranda SET Syarat = ? WHERE ID = ?";

    // Menyiapkan statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameter
        $stmt->bind_param("si", $Syarat, $ID); // "si" untuk string dan integer

        // Eksekusi query
        if ($stmt->execute()) {
            echo "<script>alert('Syarat dan Ketentuan berhasil diperbarui!'); window.location.href = '/S&Kb.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat memperbarui data.'); window.location.href = '/S&Kb.php';</script>";
        }

        // Tutup statement
        $stmt->close();
    } else {
        echo "<script>alert('Query tidak valid.'); window.location.href = '/S&Kb.php';</script>";
    }
} else {
    echo "<script>alert('Metode tidak valid.'); window.location.href = '/S&Kb.php';</script>";
}

// Tutup koneksi
$conn->close();
?>
