<?php 
session_start();
include 'includes/config.php';

// get the length of users, admin, orders, and products
  //products length
  $select_products_length = "SELECT * FROM products";
  $products_query = mysqli_query($conn, $select_products_length);
  if (mysqli_num_rows($products_query) > 0) {
    while($product_rows = mysqli_fetch_all($products_query)) {
     $products_length = count($product_rows);
    }
  }
  //admins length
  $select_admins_length = "SELECT * FROM admin";
  $admins_query = mysqli_query($conn, $select_admins_length);
  if (mysqli_num_rows($admins_query) > 0) {
    while($admins_rows = mysqli_fetch_all($admins_query)) {
      $admins_length = count($admins_rows);
    }
  }
  //users length
  $select_users_length = "SELECT * FROM users";
  $users_query = mysqli_query($conn, $select_users_length);
  if (mysqli_num_rows($users_query) > 0) {
    while($users_rows = mysqli_fetch_all($users_query)) {
     $users_length = count($users_rows);
    }
  } 
  
  //orders length
  $select_orders_length = "SELECT * FROM orders";
  $orders_query = mysqli_query($conn, $select_orders_length);
  if (mysqli_num_rows($orders_query) > 0) {
    while($orders_rows = mysqli_fetch_all($orders_query)) {
     $orders_length = count($orders_rows);
    }
  } 

?>