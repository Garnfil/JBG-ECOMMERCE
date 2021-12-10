<?php 
session_start();
include '../inc/config.php';

  $select_products_length = "SELECT * FROM products";
  $products_query = mysqli_query($conn, $select_products_length);
  if (mysqli_num_rows($products_query) > 0) {
    $product_rows = mysqli_fetch_all($products_query);
    echo json_encode($product_rows);
  }
?>