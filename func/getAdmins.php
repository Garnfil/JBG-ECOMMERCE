<?php 
require '../inc/config.php';

  $select_admins_length = "SELECT * FROM admin";
  $admins_query = mysqli_query($conn, $select_admins_length);
  if (mysqli_num_rows($admins_query) > 0) {
     $admins_rows = mysqli_fetch_all($admins_query);
     echo json_encode($admins_rows);
  }
?>