<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Ganti sesuai dengan username MySQL Anda
$password = ""; // Ganti sesuai dengan password MySQL Anda
$dbname = "wadi_borneo";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Variabel untuk menyimpan nilai input (default kosong)
$Deskripsi = '';

// Proses ketika tombol simpan ditekan
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data dari input pengguna
    $Deskripsi = $_POST['Deskripsi'] ?? '';

    // Validasi input (opsional, tambahkan sesuai kebutuhan)
    if (empty($Deskripsi)) {
        echo "Semua kolom wajib diisi!";
    } elseif (str_word_count($Deskripsi) > 500) { // Validasi jumlah kata
        echo "Deskripsi tidak boleh lebih dari 500 kata!";
    } else {
        // Query untuk update data
        $sql = "UPDATE beranda 
                SET Deskripsi = ?
                WHERE ID = 1";

        // Siapkan statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $Deskripsi);

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
$sql = "SELECT Deskripsi FROM beranda WHERE ID = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Ambil data dari hasil query
    $row = $result->fetch_assoc();
    $Deskripsi = $row['Deskripsi'];
} else {
    echo "Data tidak ditemukan!";
}

// Tutup koneksi
$conn->close();
?>
