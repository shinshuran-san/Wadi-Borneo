<?php 
include '../../Admin/CekSesi.php';
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produk = $_POST['id_produk'];
    $deskripsi = trim($_POST['deskripsi']);

    // Validasi input
    if (empty($deskripsi)) {
        echo "<script>
                alert('Deskripsi tidak boleh kosong!');
                document.location.href = 'edit_deskripsi.php?id=$id_produk';
              </script>";
        exit;
    }

    // Query update deskripsi
    $sql = "UPDATE produk SET deskripsi = ? WHERE id_produk = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $deskripsi, $id_produk);

    if ($stmt->execute()) {
        echo "<script>
                alert('Deskripsi produk berhasil diperbarui!');
                document.location.href = '../Detail_Produk_Admin/Detail_Barang_Admin.php?id=$id_produk';
              </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui deskripsi produk: " . $conn->error . "');
                document.location.href = 'edit_deskripsi.php?id=$id_produk';
              </script>";
    }

    $stmt->close();
} else {
    echo "<script>
            alert('Metode tidak valid.');
            document.location.href = '../Detail_Produk_Admin/Detail_Barang_Admin.php?id=$id_produk';
          </script>";
}

$conn->close();
?>
