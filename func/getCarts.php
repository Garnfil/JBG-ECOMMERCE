<?php 
session_start();
include '../inc/config.php';

$id = $_SESSION['uniqueid'];

  $select_carts_length = "SELECT * FROM carts WHERE user_id = '$id'";
  $carts_query = mysqli_query($conn, $select_carts_length);
  if (mysqli_num_rows($carts_query) > 0) {
    $carts_rows = mysqli_fetch_all($carts_query);
    echo json_encode($carts_rows);
  }
?>