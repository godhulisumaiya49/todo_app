<?php
session_start();

// Hardcoded credentials
$USERNAME = "admin";
$PASSWORD = "1234";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user === $USERNAME && $pass === $PASSWORD) {
        $_SESSION['loggedin'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - ToDo App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="todo-container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <button type="submit">Sign In</button>
        </form>
        <p style="color:red;"><?= $error ?></p>
        <hr>
        <p><strong>Hint:</strong> Username: <code>admin</code>, Password: <code>1234</code></p>
    </div>
</body>
</html>
