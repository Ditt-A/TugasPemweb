<?php
session_start();

// Kalau sudah login, arahkan sesuai role
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: halamanAdmin.php");
        exit;
    } elseif ($_SESSION['role'] === 'member') {
        header("Location: halamanAdmindanMember.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login Sederhana</h2>

    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>Username atau password salah!</p>";
    }
    ?>

    <form action="process_login.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>

    <hr>
    <p><b>Akun untuk uji coba:</b></p>
    <p>Admin → username: <code>admin</code>, password: <code>admin123</code></p>
    <p>Member → username: <code>member</code>, password: <code>member123</code></p>

    <p><a href="halamanAll.php">Masuk ke Halaman All (tanpa login)</a></p>
</body>
</html>