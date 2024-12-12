<?php
require 'KoneksiKontak.php';

// Ambil daftar admin dengan informasi kontak lengkap
$sql = "SELECT ID_Admin, username, No_Telpon, Email_Borneo, IG FROM tbl_users";
$result = $conn->query($sql);

$admins = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $admins[] = $row;
    }
}

$conn->close();
?>