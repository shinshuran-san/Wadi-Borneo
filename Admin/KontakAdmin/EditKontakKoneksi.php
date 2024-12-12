<?php
include '../koneksi.php';
session_start();

// Periksa apakah sesi ID_Admin ada
if (!isset($_SESSION['ID_Admin'])) {
    echo "Sesi tidak ditemukan! Silakan login terlebih dahulu.";
    exit();
}

// Ambil ID_Admin dari sesi login
$id_admin = $_SESSION['ID_Admin'];

// Variabel untuk menyimpan nilai input (default kosong)
$no_telpon = '';
$instagram = '';
$email_borneo = '';

// Proses ketika tombol simpan ditekan
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data dari input pengguna
    $no_telpon = $_POST['Nomor_Tlp'] ?? '';
    $instagram = $_POST['IG'] ?? '';
    $email_borneo = $_POST['Email'] ?? '';

    // Validasi input (opsional, tambahkan sesuai kebutuhan)
    if (empty($no_telpon) || empty($instagram) || empty($email_borneo)) {
        echo "Semua kolom wajib diisi!";
    } else {
        // Query untuk update data
        $sql = "UPDATE tbl_users 
                SET No_Telpon = ?, IG = ?, Email_Borneo = ?
                WHERE ID_Admin = ?";

        // Siapkan statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $no_telpon, $instagram, $email_borneo, $id_admin);

        // Eksekusi query
        if ($stmt->execute()) {
            echo "Data berhasil diperbarui!";
        } else {
            echo "Terjadi kesalahan: " . $conn->error;
        }

        // Tutup statement
        $stmt->close();
    }
    exit;
}

// Ambil data yang sudah ada di database (untuk diisi di form)
$sql = "SELECT No_Telpon, IG, Email_Borneo FROM tbl_users WHERE ID_Admin = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_admin);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Ambil data dari hasil query
    $row = $result->fetch_assoc();
    $no_telpon = $row['No_Telpon'];
    $instagram = $row['IG'];
    $email_borneo = $row['Email_Borneo'];
} else {
    echo "Data tidak ditemukan!";
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>
