<?php
$conn = new mysqli('localhost', 'root', '', 'ecommerce');
$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
echo "<h2>{$product['name']}</h2><img src='images/{$product['image']}' width='200'><p>{$product['description']}</p><p>Price: {$product['price']}</p>";

// Feedback form
session_start();
if (isset($_SESSION['user_id'])) {
  echo "<form method='POST'><textarea name='comment'></textarea><button type='submit' name='submit_feedback'>Submit Feedback</button></form>";
  if (isset($_POST['submit_feedback'])) {
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id'];
    $conn->query("INSERT INTO feedback (product_id, user_id, comment) VALUES ($id, $user_id, '$comment')");
  }
}

// Show feedback
$feedbacks = $conn->query("SELECT * FROM feedback WHERE product_id=$id");
while ($fb = $feedbacks->fetch_assoc()) {
  echo "<p>{$fb['comment']}</p>";
}
?>
