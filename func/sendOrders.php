<?php 
include '../includes/config.php';

$itemname = $_POST['item_name'];
$size = $_POST['size'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$total = $price * $quantity;
$customer_id = $_POST['customer_id'];
$product_id = $_POST['product_id'];
$customer_name = $_POST['customer_name'];
$customer_address = $_POST['customer_address'];
$phome = $_POST['phone'];

$sql = "INSERT INTO orders(order_user_id, order_name, size, quantity, price, total, order_product_id, fullname, address, contact) VALUES('$customer_id', '$itemname', '$size', '$quantity', '$price', '$total', '$product_id', '$customer_name', '$customer_address', '$phone')";

  if (mysqli_query($conn, $sql)) {
    // success
  } else {
    echo mysqli_error($conn);
  }
  



?>