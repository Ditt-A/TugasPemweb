<?php
require 'koneksi.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['email'] = $user['email'];

        header("Location: dashboard.php");
        exit;
    } else {
        $message = "Email atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Form Login</h2>
    <form method="POST">
        Email: <br>
        <input type="email" name="email"><br><br>

        Password: <br>
        <input type="password" name="password"><br><br>

        <button type="submit">Login</button>
    </form>

    <p><?php echo $message; ?></p>
    <p>Belum punya akun? <a href="register.php">Registrasi</a></p>
</body>
</html>