<!-- register.php -->
<form method="POST" action="">
  <input type="text" name="username" required placeholder="Username">
  <input type="password" name="password" required placeholder="Password">
  <button type="submit" name="register">Register</button>
</form>
<?php
if (isset($_POST['register'])) {
  $conn = new mysqli('localhost', 'root', '', 'ecommerce');
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
  echo "Registration successful!";
}
?>
