<?php
require 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['nama']); ?>!</h2>
    <p>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></p>

    <ul>
        <li><a href="edit_profile.php">Ubah Profil</a></li>
        <li><a href="delete_account.php" onclick="return confirm('Yakin ingin menghapus akun?')">Hapus Akun</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>