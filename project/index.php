<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome</title>
  <link rel="stylesheet" href="./assest/css/style.css">
</head>
<body>
<div class="welcome-box">
  <h1>Welcome, <?php echo $_SESSION['username']; ?> 🎉</h1>
  <a href="logout.php">Logout</a>
</div>
</body>
</html>
