<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

// Fetch tasks
$stmt = $conn->query("SELECT * FROM tasks ORDER BY id DESC");
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <div class="header">
            <h1>Welcome, <?= htmlspecialchars('admin') ?>!</h1>
            <a class="logout" href="logout.php">Logout</a>
        </div>

        <form class="task-form" action="add.php" method="POST">
            <input type="text" name="task" placeholder="Enter a new task" required>
            <button type="submit">Add Task</button>
        </form>

        <ul class="task-list">
            <?php if (count($tasks) === 0): ?>
                <li class="no-task">No tasks yet. Add one!</li>
            <?php else: ?>
                <?php foreach ($tasks as $row): ?>
                    <li>
                        <span><?= htmlspecialchars($row['task']) ?></span>
                        <a href="delete.php?id=<?= $row['id'] ?>">❌</a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</body>
</html>
