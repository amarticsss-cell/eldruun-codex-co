<?php
require "db.php";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $pass     = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$pass')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        $error = "Gagal menyimpan data!";
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Register</h2>

    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">Register</button>
        <p>Sudah punya akun? <a href="index.php">Login</a></p>
    </form>
</div>
