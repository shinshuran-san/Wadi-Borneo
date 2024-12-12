<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jenis_kategori = $_POST['jenis_kategori'];

    
    $sql = "INSERT INTO kategori (jenis_kategori) 
        VALUES ('$jenis_kategori')";
    if ($conn->query($sql)) {
        echo "<script>
                alert('Produk berhasil ditambahkan');
                document.location.href = '../Katagori_Admin/katagori_admin.php';
                </script>";
    } else {
        echo "Gagal menyimpan ke database: " . $conn->error;
    }
}
$conn->close();
?>
