<?php
include 'koneksi_stock.php'; // Database connection

// Check if the data is sent via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['category']) && isset($data['products'])) {
        $category = $conn->real_escape_string($data['category']);
        $products = $data['products'];

        // Loop through each product and update the stock
        foreach ($products as $product) {
            $nama_produk = $conn->real_escape_string($product['nama_produk']);
            $stok = (int) $product['stok'];

            // Update the stock for each product in the selected category
            $sql = "UPDATE produk 
                    SET stok = $stok 
                    WHERE nama_produk = '$nama_produk' AND id_kategori = (
                        SELECT id_kategori FROM kategori WHERE jenis_kategori = '$category'
                    )";

            if (!$conn->query($sql)) {
                // If there's an error updating, return the error message
                echo json_encode(['success' => false, 'message' => 'Error updating stock: ' . $conn->error]);
                exit;
            }
        }

        // If everything is successful, return success message
        echo json_encode(['success' => true, 'message' => 'Stock updated successfully']);
        exit;
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid data']);
        exit;
    }
}
?>
