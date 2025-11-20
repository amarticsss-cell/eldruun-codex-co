<?php
session_start();
require "db.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass     = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user'] = $username;
        header("Location: home.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/athena2.png">

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">
    <h2>Login</h2>

    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>

        <p>Belum punya akun? <a href="register.php">Register</a></p>
    </form>
</div>

</body>
</html>

