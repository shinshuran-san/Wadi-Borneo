<?php
include '../../Admin/CekSesi.php'; 
include '../../Admin/koneksi.php'; 

$sql = "SELECT alamat, email FROM tbl_users WHERE ID_Admin = 1"; 
$result = $conn->query($sql);

$alamat = '';
$email = '';

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $alamat = $row['alamat'];
    $email = $row['email'];
} else {
    echo "<script>alert('Data tID_Adminak ditemukan.'); window.location.href = '../Kontak/KontakAdmin.php';</script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alamat_baru = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';
    $email_baru = isset($_POST['email']) ? trim($_POST['email']) : '';

    if (empty($alamat_baru)) {
        echo "<script>alert('Alamat harus diisi.'); window.location.href = 'edit_lokasiadmin.php';</script>";
        exit();
    }

    $sql_update = "UPDATE tbl_users SET alamat = ? WHERE ID_Admin = 1";

    if ($stmt = $conn->prepare($sql_update)) {
        $stmt->bind_param("s", $alamat_baru);

        if ($stmt->execute()) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href = 'BerandaAdmin.php';</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat memperbarui data.'); window.location.href = 'edit_lokasiadmin.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Query tID_Adminak valID_Admin.'); window.location.href = 'edit_lokasiadmin.php';</script>";
    }
}

$conn->close();
?>
