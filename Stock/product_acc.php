<?php

include 'koneksi_stock.php'; // Database connection

// Daftar kategori yang diizinkan
$allowedCategories = [
    'Nila', 'Jelawat', 'Kapak', 'Emas', 'Papuyu', 'Patin', 'Riu', 'Sepat'
];

// Query untuk mengambil kategori
$query = "SELECT * FROM kategori";
$categories = $conn->query($query);

$tableList = [];
if ($categories->num_rows > 0) {
    while ($row = $categories->fetch_assoc()) {
        $tableList[] = $row;
    }
}
?>