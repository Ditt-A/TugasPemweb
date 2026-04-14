<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Data user hardcoded
    $users = [
        "admin" => [
            "password" => "admin123",
            "role" => "admin"
        ],
        "member" => [
            "password" => "member123",
            "role" => "member"
        ]
    ];

    if (isset($users[$username]) && $password === $users[$username]["password"]) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $users[$username]["role"];

        // Redirect sesuai role
        if ($_SESSION["role"] === "admin") {
            header("Location: halamanAdmin.php");
            exit;
        } else {
            header("Location: halamanAdmindanMember.php");
            exit;
        }
    } else {
        header("Location: login.php?error=1");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}