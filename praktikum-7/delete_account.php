<?php
require 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

try {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $_SESSION['user_id']);
    $stmt->execute();

    session_unset();
    session_destroy();

    header("Location: register.php");
    exit;
} catch (PDOException $e) {
    echo "Gagal menghapus akun. Silakan coba lagi.";
}
?>