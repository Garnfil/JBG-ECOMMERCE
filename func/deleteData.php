<?php 
include '../includes/config.php';

if ($_GET['action'] == 'delete_user') {
  $id = $_GET['id'];
  $sql = "DELETE FROM users WHERE user_unique_id = '$id'";
  if (mysqli_query($conn, $sql)) {
    header('location: ../admin.php');
  } else{
    echo mysqli_error($conn);
  }
}

if ($_GET['action'] == 'delete_admin') {
  $id = $_GET['id'];
  $sql = "DELETE FROM admin WHERE admin_unique_id = '$id'";
  if (mysqli_query($conn, $sql)) {
    header('location: ../admin.php');
  } else{
    echo mysqli_error($conn);
  }
}

if ($_GET['action'] == 'delete_product') {
  $id = $_GET['id'];
  $sql = "DELETE FROM products WHERE product_id = '$id'";
  if (mysqli_query($conn, $sql)) {
    header('location: ../admin.php');
  } else{
    echo mysqli_error($conn);
  }
}

if ($_GET['action'] == 'delete_order') {
  $id = $_GET['id'];
  $sql = "DELETE FROM orders WHERE id = '$id'";
  if (mysqli_query($conn, $sql)) {
    header('location: ../admin.php');
  } else{
    echo mysqli_error($conn);
  }
}



?>