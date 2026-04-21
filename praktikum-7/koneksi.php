<?php
try {
    $conn = new PDO("sqlite:" . __DIR__ . "/database.sqlite");

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

session_start();
?>