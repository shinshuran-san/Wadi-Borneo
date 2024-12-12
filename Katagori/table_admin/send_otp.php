<?php
session_start(); // Memulai sesi untuk menyimpan OTP

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Generate OTP
        $otp = rand(1000, 9999);
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;

        // Send OTP via email
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'wadiborneo2@gmail.com'; // Ganti dengan email Anda
            $mail->Password = 'diuqaewkwbkdytvf'; // Ganti dengan password aplikasi Anda
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('from@example.com', 'Wadi Borneo');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Kode OTP Anda';
            $mail->Body = "<h2>Kode OTP Anda adalah <strong>$otp</strong></h2><p>Gunakan kode ini untuk memverifikasi email Anda.</p>";

            $mail->send();
            echo 'OTP telah dikirim ke email Anda.';
            header('Location: Edit_Email.php');
        } catch (Exception $e) {
            echo "Gagal mengirim OTP. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'Email tidak valid.';
    }
} else {
    echo 'Metode permintaan tidak valid.';
}
?>
