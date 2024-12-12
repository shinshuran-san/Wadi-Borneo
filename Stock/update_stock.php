<?php
include 'koneksi_stock.php';

// Daftar kategori yang diizinkan
$allowedCategories = [
    'Nila', 'Jelawat', 'Kapak', 'Emas', 'Papuyu', 'Patin', 'Riu', 'Sepat'
];

// Jika ada request AJAX untuk mendapatkan data dari kategori
if (isset($_GET['table'])) {
    $category = $conn->real_escape_string($_GET['table']);

    // Validasi apakah kategori yang diminta termasuk dalam daftar yang diizinkan
    if (!in_array($category, $allowedCategories)) {
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'Kategori tidak diizinkan']);
        exit;
    }

    // Query untuk mengambil produk berdasarkan kategori
    $sql = "
        SELECT p.nama_produk, p.stok 
        FROM produk p
        JOIN kategori k ON p.id_kategori = k.id_kategori
        WHERE k.jenis_kategori = '$category'
    ";

    $result = $conn->query($sql);

    $data = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Mengembalikan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

// Jika tidak ada request AJAX, ambil daftar kategori
$query = "SELECT * FROM kategori";
$categories = $conn->query($query);

$tableList = [];
if ($categories->num_rows > 0) {
    while ($row = $categories->fetch_assoc()) {
        $tableList[] = $row;
    }
}
?>
