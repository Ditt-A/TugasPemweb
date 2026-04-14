<?php
require_once "auth.php";
checkRole(["admin", "member"]);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman B</title>
</head>
<body>
    <h2>Halaman B</h2>
    <p>Selamat datang, <b><?php echo $_SESSION["username"]; ?></b>!</p>
    <p>Role Anda: <b><?php echo $_SESSION["role"]; ?></b></p>
    <p>Halaman ini bisa diakses oleh <b>admin</b> dan <b>member</b>.</p>

    <hr>
    <?php if ($_SESSION["role"] === "admin") : ?>
        <a href="halamanAdmin.php">Ke Halaman Admin</a><br>
    <?php endif; ?>
    <a href="halamanAll.php">Ke Halaman All</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>