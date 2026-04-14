<?php
session_start();

function checkLogin() {
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("Location: login.php");
        exit;
    }
}

function checkRole($allowedRoles = []) {
    checkLogin();

    if (!in_array($_SESSION["role"], $allowedRoles)) {
        echo "<h3>Akses ditolak!</h3>";
        echo "<p>Anda tidak memiliki izin untuk membuka halaman ini.</p>";
        echo "<p><a href='halamanAll.php'>Ke Halaman All</a></p>";
        echo "<p><a href='logout.php'>Logout</a></p>";
        exit;
    }
}
?>