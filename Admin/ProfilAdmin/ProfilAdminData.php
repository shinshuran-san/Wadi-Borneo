<?php
include '../koneksi.php';
session_start();

if (!isset($_SESSION['ID_Admin'])) {
    header("Location: /Index.php");
    exit();
}

$id_admin = $_SESSION['ID_Admin'];

$username = '';
$no_telpon = '';
$email = '';
$gambar = '';

$folderUpload = '../../Gambar/';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $no_telpon = $_POST['no_telpon'];
    $email = $_POST['email'];

    // Validasi nomor telepon
    if (!preg_match('/^\d{11}$/', $no_telpon)) {
        echo "Nomor telepon harus tepat 11 digit.";
        exit();
    }


    // Ambil data gambar lama jika tidak ada yang diunggah
    $sqlGetOldImage = "SELECT gambar FROM tbl_users WHERE ID_Admin = ?";
    $stmtGetOldImage = $conn->prepare($sqlGetOldImage);
    $stmtGetOldImage->bind_param("i", $id_admin);
    $stmtGetOldImage->execute();
    $resultOldImage = $stmtGetOldImage->get_result();

    if ($resultOldImage->num_rows > 0) {
        $row = $resultOldImage->fetch_assoc();
        $oldImage = $row['gambar'];
    }
    $stmtGetOldImage->close();

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $namaFile = basename($_FILES['gambar']['name']);
        $fileTujuan = $folderUpload . $namaFile;

        $ext = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($ext, $allowed)) {
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $fileTujuan)) {
                $gambar = "/Gambar/" . $namaFile;
            } else {
                $gambar = $oldImage; // Jika gagal upload, gunakan gambar lama
            }
        } else {
            $gambar = $oldImage; // Format tidak valid, gunakan gambar lama
        }
    } else {
        $gambar = $oldImage; // Tidak ada file diunggah
    }

    $sql = "UPDATE tbl_users SET username = ?, No_Telpon = ?, gambar = ? WHERE ID_Admin = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $no_telpon, $gambar, $id_admin);

    if ($stmt->execute()) {
        echo "Data berhasil diperbarui!";
    } else {
        echo "Terjadi kesalahan: " . $conn->error;
    }
    $stmt->close();
} else {
    $sql = "SELECT username, No_Telpon, Email, gambar FROM tbl_users WHERE ID_Admin = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_admin);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $no_telpon = $row['No_Telpon'];
        $email = $row['Email'];
        $gambar = $row['gambar'];
    } else {
        echo "Data tidak ditemukan!";
        exit();
    }
    $stmt->close();
}

$conn->close();
?>
