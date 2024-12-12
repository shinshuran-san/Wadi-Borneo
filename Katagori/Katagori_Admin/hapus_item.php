<?php
include '../koneksi.php';

// Mendapatkan parameter 'id' dari URL
$id_produk = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_produk > 0) {
    $sql_delete = "DELETE FROM produk WHERE id_produk = ?";

    // Menyiapkan statement SQL
    if ($stmt = $conn->prepare($sql_delete)) {
        // Mengikat parameter dan mengeksekusi query
        $stmt->bind_param("i", $id_produk); // "i" untuk integer
        if ($stmt->execute()) {
            // Jika berhasil menghapus data, redirect ke halaman kategori
            echo "<script>alert('Produk berhasil dihapus!'); window.location.href='../Katagori_Admin/katagori_admin.php';</script>";
        } else {
            // Jika gagal menghapus data
            echo "<script>alert('Terjadi kesalahan saat menghapus produk.'); window.location.href='../Katagori_Admin/katagori_admin.php';</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Query tidak valid.'); window.location.href='../Katagori_Admin/katagori_admin.php';</script>";
    }
} else {
    // Jika id tidak valid, redirect ke halaman kategori
    echo "<script>alert('ID Produk tidak ditemukan atau tidak valid.'); window.location.href='../Katagori_Admin/katagori_admin.php';</script>";
}

$conn->close();
?>
