<!-- login.php -->
<form method="POST" action="">
  <input type="text" name="username" required placeholder="Username">
  <input type="password" name="password" required placeholder="Password">
  <button type="submit" name="login">Login</button>
</form>
<?php
session_start();
if (isset($_POST['login'])) {
  $conn = new mysqli('localhost', 'root', '', 'ecommerce');
  $username = $_POST['username'];
  $result = $conn->query("SELECT * FROM users WHERE username='$username'");
  $user = $result->fetch_assoc();
  if ($user && password_verify($_POST['password'], $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    header("Location: index.php");
  } else {
    echo "Invalid credentials!";
  }
}
?>
