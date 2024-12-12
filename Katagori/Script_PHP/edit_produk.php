<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produk = $_POST['id_produk'];
    $nama_produk = trim($_POST['nama_produk']);
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $folderUpload = '../../Gambar/';
    $id_kategori = null;

    // Ambil kategori dari database
    $kategoriQuery = "SELECT id_kategori, LOWER(jenis_kategori) AS jenis_kategori FROM kategori";
    $kategoriResult = $conn->query($kategoriQuery);

    if ($kategoriResult->num_rows > 0) {
        while ($row = $kategoriResult->fetch_assoc()) {
            $keyword = strtolower($row['jenis_kategori']);
            if (stripos($nama_produk, $keyword) !== false) {
                $id_kategori = $row['id_kategori'];
                break;
            }
        }
    }

    // Validasi apakah kategori ditemukan
    if (!$id_kategori) {
        echo "<script>
                alert('Kategori tidak ditemukan berdasarkan nama produk.');
                document.location.href = '../Katagori_Admin/katagori_admin.php';
              </script>";
        exit;
    }

    // Cek apakah ada file gambar yang diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $namaFile = basename($_FILES['gambar']['name']);
        $fileTujuan = $folderUpload . $namaFile;

        // Validasi file gambar
        $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($ext, $allowed)) {
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $fileTujuan)) {
                $gambar = "/Gambar/" . $namaFile;

                // Update produk dengan gambar baru
                $sql = "UPDATE produk SET 
                        id_kategori = '$id_kategori',
                        gambar = '$gambar',
                        nama_produk = '$nama_produk', 
                        harga = '$harga', 
                        deskripsi = '$deskripsi', 
                        stok = '$stok' 
                        WHERE id_produk = $id_produk";
            } else {
                echo "<script>alert('Gagal mengupload gambar baru.'); window.location.href = '../Katagori_Admin/katagori_admin.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Format file tidak didukung! Hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan.'); window.location.href = '../Katagori_Admin/katagori_admin.php';</script>";
            exit();
        }
    } else {
        // Jika tidak ada gambar baru, hanya update data selain gambar
        $sql = "UPDATE produk SET 
                id_kategori = '$id_kategori',
                nama_produk = '$nama_produk', 
                harga = '$harga', 
                deskripsi = '$deskripsi', 
                stok = '$stok' 
                WHERE id_produk = $id_produk";
    }

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Produk berhasil diperbarui!'); window.location.href = '../Katagori_Admin/katagori_admin.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "<script>alert('Metode tidak valid.'); window.location.href = '../Katagori_Admin/katagori_admin.php';</script>";
}

$conn->close();
?>
