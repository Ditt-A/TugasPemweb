<?php
require 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);

    if ($nama == "" || $email == "") {
        $message = "Nama dan email tidak boleh kosong.";
    } else {
        try {
            $stmt = $conn->prepare("UPDATE users SET nama = :nama, email = :email WHERE id = :id");
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $_SESSION['user_id']);
            $stmt->execute();

            $_SESSION['nama'] = $nama;
            $_SESSION['email'] = $email;

            $message = "Profil berhasil diperbarui.";
        } catch (PDOException $e) {
            $message = "Gagal memperbarui profil. Email mungkin sudah digunakan.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Profil</title>
</head>
<body>
    <h2>Ubah Profil</h2>
    <form method="POST">
        Nama: <br>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($_SESSION['nama']); ?>"><br><br>

        Email: <br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>"><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <p><?php echo $message; ?></p>
    <p><a href="dashboard.php">Kembali ke Dashboard</a></p>
</body>
</html>