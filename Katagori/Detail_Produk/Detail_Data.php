<?php
include '../koneksi.php';

if (isset($_GET['id'])) {
    $id_produk = intval($_GET['id']); // Validasi sebagai integer

    // Query untuk mendapatkan detail produk berdasarkan ID
    $sql = "SELECT p.*, k.jenis_kategori 
            FROM produk p 
            JOIN kategori k ON p.id_kategori = k.id_kategori 
            WHERE p.id_produk = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_produk);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Ambil data produk
    } else {
        echo "<script>alert('Produk tidak ditemukan.'); window.location.href='../Katagori_Admin/katagori_admin.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID produk tidak valid.'); window.location.href='../Katagori_Admin/katagori_admin.php';</script>";
    exit;
}
?>
