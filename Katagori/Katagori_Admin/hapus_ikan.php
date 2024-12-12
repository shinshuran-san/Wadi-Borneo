<?php
include '../koneksi.php';

// Mendapatkan parameter 'id' dari URL
$id_kategori = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_kategori > 0) {
    $sql_delete = "DELETE FROM kategori WHERE id_kategori = ?";

    // Menyiapkan statement SQL
    if ($stmt = $conn->prepare($sql_delete)) {
        $stmt->bind_param("i", $id_kategori); // "i" untuk integer
        if ($stmt->execute()) {
            // Jika berhasil menghapus data, redirect ke halaman kategori
            echo "<script>alert('Kategori berhasil dihapus!'); window.location.href='../Katagori_Admin/katagori_admin.php';</script>";
        } else {
            // Jika gagal menghapus data
            echo "<script>alert('Terjadi kesalahan saat menghapus kategori.'); window.location.href='../Katagori_Admin/katagori_admin.php';</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Query tidak valid.'); window.location.href='../Katagori_Admin/katagori_admin.php';</script>";
    }
} else {
    // Jika id tidak valid, redirect ke halaman kategori
    echo "<script>alert('ID kategori tidak ditemukan atau tidak valid.'); window.location.href='../Katagori_Admin/katagori_admin.php';</script>";
}

$conn->close();
?>
