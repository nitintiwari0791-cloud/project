<?php
include("config/db.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            header("Location: welcome.php");
            exit;
        } else {
            $error = "Invalid Password!";
        }
    } else {
        $error = "No user found with this email!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="./assest/css/style.css">
</head>
<body>
<div class="form-container">
  <h2>Login</h2>
  <?php if(!empty($error)) echo "<p class='error'>$error</p>"; ?>
  <form method="POST" class="animated-form">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>
  <p>Don’t have an account? <a href="register.php">Register</a></p>
</div>
</body>
</html>
