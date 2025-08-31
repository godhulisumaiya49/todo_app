<?php
// Database file path (in project folder)
$dbFile = __DIR__ . "/todo.db";

try {
    // Create or open SQLite DB
    $conn = new PDO("sqlite:" . $dbFile);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create table if not exists
    $conn->exec("CREATE TABLE IF NOT EXISTS tasks (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        task TEXT NOT NULL
    )");

} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>
