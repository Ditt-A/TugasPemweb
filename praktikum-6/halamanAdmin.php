<?php
require_once "auth.php";
checkRole(["admin"]);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman A</title>
</head>
<body>
    <h2>Halaman A</h2>
    <p>Selamat datang, <b><?php echo $_SESSION["username"]; ?></b>!</p>
    <p>Role Anda: <b><?php echo $_SESSION["role"]; ?></b></p>
    <p>Halaman ini hanya bisa diakses oleh <b>admin</b>.</p>

    <hr>
    <a href="halamanAdmindanMember.php">Ke Halaman Admin dan Member</a><br>
    <a href="halamanAll.php">Ke Halaman All</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>