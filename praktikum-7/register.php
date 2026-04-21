<?php
require 'koneksi.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($nama == "" || $email == "" || $password == "") {
        $message = "Semua field harus diisi!";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $conn->prepare("INSERT INTO users (nama, email, password) VALUES (:nama, :email, :password)");
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();

            $message = "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
        } catch (PDOException $e) {
            $message = "Registrasi gagal: email mungkin sudah digunakan.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
</head>
<body>
    <h2>Form Registrasi</h2>
    <form method="POST">
        Nama: <br>
        <input type="text" name="nama"><br><br>

        Email: <br>
        <input type="email" name="email"><br><br>

        Password: <br>
        <input type="password" name="password"><br><br>

        <button type="submit">Daftar</button>
    </form>

    <p><?php echo $message; ?></p>
    <p>Sudah punya akun? <a href="login.php">Login</a></p>
</body>
</html>