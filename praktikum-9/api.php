<?php
header("Content-Type: application/json");

try {
    $databaseDir = __DIR__ . "/database";

    if (!is_dir($databaseDir)) {
        mkdir($databaseDir, 0777, true);
    }

    $databaseFile = $databaseDir . "/todo_list.sqlite";

    $pdo = new PDO("sqlite:" . $databaseFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS tasks (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            task TEXT NOT NULL,
            completed INTEGER DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )
    ");

    $action = isset($_GET["action"]) ? $_GET["action"] : "";

    switch ($action) {
        case "add":
            if (!isset($_POST["task"]) || trim($_POST["task"]) === "") {
                echo json_encode([
                    "success" => false,
                    "error" => "Task tidak boleh kosong"
                ]);
                exit;
            }

            $task = trim($_POST["task"]);

            $stmt = $pdo->prepare("INSERT INTO tasks (task) VALUES (:task)");
            $stmt->bindParam(":task", $task, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo json_encode([
                    "success" => true,
                    "message" => "Task berhasil ditambahkan"
                ]);
            } else {
                echo json_encode([
                    "success" => false,
                    "error" => "Task gagal ditambahkan"
                ]);
            }
            break;

        case "get":
            $stmt = $pdo->query("SELECT * FROM tasks ORDER BY id ASC");
            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode($tasks);
            break;

        case "delete":
            if (!isset($_POST["id"])) {
                echo json_encode([
                    "success" => false,
                    "error" => "ID task tidak ditemukan"
                ]);
                exit;
            }

            $id = intval($_POST["id"]);

            $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                echo json_encode([
                    "success" => true,
                    "message" => "Task berhasil dihapus"
                ]);
            } else {
                echo json_encode([
                    "success" => false,
                    "error" => "Task gagal dihapus"
                ]);
            }
            break;

        default:
            echo json_encode([
                "success" => false,
                "error" => "Action tidak valid"
            ]);
            break;
    }

} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "error" => "Database error: " . $e->getMessage()
    ]);
}
?>