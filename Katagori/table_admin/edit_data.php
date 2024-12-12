<?php
include '../koneksi.php';

// Mengambil ID dan tabel dari URL
$id = isset($_GET['id']) ? $_GET['id'] : null;
$table = isset($_GET['table']) ? $_GET['table'] : null;

if ($id && $table) {
    // Query untuk mendapatkan data yang akan diedit
    $sql = "SELECT * FROM $table WHERE ID_Admin = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
} else {
    echo "ID atau tabel tidak valid.";
    exit;
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password_input = $_POST['password_input']; // Password input dari user
    $username = $_POST['username'];
    $no_telpon = $_POST['no_telpon'];
    $instagram = $_POST['instagram'];
    $email_borneo = $_POST['email_borneo'];

    // Validasi nomor telepon (harus 11 digit)
    if (!preg_match('/^\d{11}$/', $no_telpon)) {
        echo "<script>alert('Nomor telepon harus tepat 11 digit.'); window.location.href = 'table_admin.php';</script>";
        exit();
    }


    // Verifikasi password input dengan password yang ada di database (tanpa hash)
    if ($password_input === $data['password']) { // Verifikasi langsung tanpa hash
        // Jika password valid, lakukan update
        $sql_update = "UPDATE $table SET username = ?, No_Telpon = ?, IG = ?, Email_Borneo = ? WHERE ID_Admin = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param('ssssi', $username, $no_telpon, $instagram, $email_borneo, $id);

        if ($stmt_update->execute()) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href='table_admin.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui data.');</script>";
        }
    } else {
        // Jika password tidak valid
        echo "<script>alert('Password yang dimasukkan salah!');</script>";
    }
}
?>
