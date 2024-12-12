<?php
include 'koneksi_stock.php'; // Database connection

// Check if the category is passed via GET
if (isset($_GET['table'])) {
    $category = $_GET['table'];

    // Sanitize input (avoid SQL injection)
    $category = $conn->real_escape_string($category);

    // Query to get products based on the category
    $sql = "SELECT p.nama_produk, p.stok 
            FROM produk p
            JOIN kategori k ON p.id_kategori = k.id_kategori
            WHERE k.jenis_kategori = '$category'"; // Assuming 'jenis_kategori' is in 'kategori' table
    $result = $conn->query($sql);

    $data = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}
?>
