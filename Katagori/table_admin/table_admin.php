<?php

include '../../Admin/CekSesi.php'; 

include 'table_data.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wadi Borneo - Kategori</title>
    <link rel="stylesheet" href="table_admin.css">
    <link rel="stylesheet" href="../katagori.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/bawah.css">
</head>
<body>
<header>
        <div class="logo">
            <h1>WADI BORNEO</h1>
        </div>
        <nav>
        <a href="/Admin/BerandaAdmin/BerandaAdmin.php">BERANDA</a>
        <a href="/Katagori/Katagori_Admin/katagori_admin.php">KATEGORI</a>
            <a href="/Kontak/KontakAdmin.php">KONTAK</a>
            <a href="/Admin/ProfilAdmin/ProfilAdmin.php">PROFIL</a>
        </nav>
    </header>

    <div class="main-container">
        <div class="main-content">
            <h2>Admin</h2>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Foto Profil</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>No Telfon</th>
                            <th>Instagram</th>
                            <th>Email Borneo</th>
                            <th>Aksi</th>
                            <th>Sesi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result_admin->num_rows > 0) {
                            while ($row = $result_admin->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td><img src="' . $row['gambar'] . '" alt="Gambar" style="width: 80px; height: 80px; object-fit: cover;"></td>';
                                echo '<td>' . $row['username'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>' . $row['No_Telpon'] . '</td>';
                                echo '<td>' . $row['IG'] . '</td>';
                                echo '<td>' . $row['Email_Borneo'] . '</td>';
                                echo '<td>';
                                echo '<a href="edit_admin.php?id=' . $row['ID_Admin' ] . '&table=tbl_users'  . '" class="edit-button" title="Edit Produk">🖉</a>';
                                echo '<a href="Edit_Email.php?id=' . $row['ID_Admin'] . '&table=tbl_users" onclick="return confirm(\'Apakah Anda yakin ingin menggati Email?\')" class="delete-button" title="Hapus Data">📧</a>';
                                echo '</td>';
                                echo '<td>' . (isset($row['login_time']) ? $row['login_time'] : 'N/A') . '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="4">Tidak ada produk.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <?php include '../../bawaha.php'; ?>
</body>
</html>
