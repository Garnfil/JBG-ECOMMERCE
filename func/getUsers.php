<?php
include '../includes/config.php';

$select_users_length = "SELECT * FROM users";
  $users_query = mysqli_query($conn, $select_users_length);
  if (mysqli_num_rows($users_query) > 0) {
     $users_rows = mysqli_fetch_all($users_query);
  };
  echo json_encode($users_rows);
  
?>