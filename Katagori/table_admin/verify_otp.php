<?php
session_start();
include('../../Admin/koneksi.php'); // Pastikan file koneksi.php sudah disertakan untuk koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entered_otp = $_POST['otp'];
    $email = $_SESSION['email'] ?? ''; // Ambil email dari sesi jika ada

    // Periksa apakah email ada dalam sesi
    if (!empty($email)) {
        // Cek apakah email ada di dalam database
        $query = "SELECT email FROM tbl_users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Email ditemukan di database, lanjutkan pengecekan OTP
            if (isset($_SESSION['otp']) && $entered_otp == $_SESSION['otp']) {
                // OTP cocok
                echo 'Verifikasi berhasil. Anda akan diarahkan ke halaman berikutnya.';
                $_SESSION['otp'] = true;
                header('Location: ResEmail.php'); // Ganti dengan halaman untuk edit password
                exit();
            } else {
                echo 'OTP yang Anda masukkan salah.';
            }
        } else {
            // Email tidak ditemukan di database, hapus sesi email
            unset($_SESSION['email']);
            unset($_SESSION['otp']); // Hapus OTP setelah berhasil diverifikasi
            echo 'Email tidak ditemukan di database. Sesi email telah dihapus.';
            header('Location: MissPass.php'); // Ganti dengan halaman tujuan berikutnya
        }
    } else {
        echo 'Tidak ada email yang terdaftar dalam sesi.';
    }
} else {
    echo 'Metode permintaan tidak valid.';
}
?>