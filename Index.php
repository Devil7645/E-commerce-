<?php
$conn = new mysqli('localhost', 'root', '', 'ecommerce');
$result = $conn->query("SELECT * FROM products");
while ($row = $result->fetch_assoc()) {
  echo "<div>
    <img src='images/{$row['image']}' width='100'>
    <h3>{$row['name']}</h3>
    <p>{$row['description']}</p>
    <p>Price: {$row['price']}</p>
    <a href='product.php?id={$row['id']}'>View Product</a>
  </div>";
}
?>
