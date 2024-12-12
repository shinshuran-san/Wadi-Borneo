<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaProduk = trim($_POST['nama_produk']);
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $folderUpload = '../../Gambar/';
    $id_kategori = null;

    // Ambil semua kategori dari database
    $kategoriQuery = "SELECT id_kategori, LOWER(jenis_kategori) AS jenis_kategori FROM kategori";
    $kategoriResult = $conn->query($kategoriQuery);

    if ($kategoriResult->num_rows > 0) {
        while ($row = $kategoriResult->fetch_assoc()) {
            $keyword = strtolower($row['jenis_kategori']);
            if (stripos($namaProduk, $keyword) !== false) {
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

                // Proses insert ke database
                $sql = "INSERT INTO produk (id_kategori, nama_produk, harga, deskripsi, stok, gambar) 
                        VALUES ('$id_kategori', '$namaProduk', '$harga', '$deskripsi', '$stok', '$gambar')";
                if ($conn->query($sql)) {
                    echo "<script>
                            alert('Produk berhasil ditambahkan');
                            document.location.href = '../Katagori_Admin/katagori_admin.php';
                          </script>";
                } else {
                    echo "Gagal menyimpan ke database: " . $conn->error;
                }
            } else {
                echo "Gagal mengupload file.";
            }
        } else {
            echo "Format file tidak didukung!";
        }
    } else {
        echo "Gambar belum dipilih atau terjadi kesalahan.";
    }
}

$conn->close();
?>
