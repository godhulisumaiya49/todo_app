<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = trim($_POST['task']);
    if (!empty($task)) {
        $stmt = $conn->prepare("INSERT INTO tasks (task) VALUES (:task)");
        $stmt->bindParam(':task', $task);
        $stmt->execute();
    }
}
header("Location: index.php");
exit();
?>
