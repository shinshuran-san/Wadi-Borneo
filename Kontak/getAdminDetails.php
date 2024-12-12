<?php
require 'KoneksiKontak.php';

if (isset($_GET['ID_Admin'])) {
    $id_admin = $_GET['ID_Admin'];

    // Ambil data admin berdasarkan ID
    $sql = "SELECT No_Telpon, Email_Borneo, IG FROM tbl_users WHERE ID_Admin = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_admin);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode([
            'success' => true,
            'No_Telpon' => $row['No_Telpon'],
            'Email_Borneo' => $row['Email_Borneo'],
            'IG' => $row['IG']
        ]);
    } else {
        echo json_encode(['success' => false]);
    }

    $stmt->close();
}

$conn->close();
?>
