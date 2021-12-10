<?php
include '../inc/config.php';

$select_orders_length = "SELECT * FROM orders";
  $orders_query = mysqli_query($conn, $select_orders_length);
  if (mysqli_num_rows($orders_query) > 0) {
     $orders_rows = mysqli_fetch_all($orders_query);
  };
  echo json_encode($orders_rows);
  
?>