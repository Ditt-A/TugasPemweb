<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman C</title>
</head>
<body>
    <h2>Halaman C</h2>
    <p>Halaman ini bisa diakses oleh <b>semua orang</b>.</p>

    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
        <p>Anda sedang login sebagai <b><?php echo $_SESSION["username"]; ?></b> (<?php echo $_SESSION["role"]; ?>).</p>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <p>Anda belum login.</p>
        <a href="login.php">Login</a>
    <?php endif; ?>
</body>
</html>