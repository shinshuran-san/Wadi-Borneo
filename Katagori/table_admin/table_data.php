<?php
include '../../Admin/koneksi.php'; 




$sql_min_id = "SELECT MIN(ID_Admin) AS min_id FROM tbl_users";
$result_min_id = $conn->query($sql_min_id);
$min_id = null;

if ($result_min_id && $row = $result_min_id->fetch_assoc()) {
    $min_id = $row['min_id'];
}

$sql_admin = "SELECT u.*, s.login_time 
              FROM tbl_users u
              LEFT JOIN active_sessions s ON u.ID_Admin = s.ID_Admin";
$result_admin = $conn->query($sql_admin);

// Dengan asumsi ID_Admin = 1 adalah admin yang dapat melihat kata sandi
$admin_id_to_view_password = 1;


// Periksa apakah admin sudah masuk dan ambil ID admin yang masuk
$logged_in_admin_id = isset($_SESSION['ID_Admin']) ? $_SESSION['ID_Admin'] : null;

// Query untuk mendapatkan kategori
$sql_kategori = "SELECT id_kategori, jenis_kategori FROM kategori";
$result_kategori = $conn->query($sql_kategori);

$sql_sesi = "SELECT * FROM active_sessions";
$result_sesi = $conn->query($sql_sesi);

?>