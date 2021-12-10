<?php 
session_start();
include '../inc/config.php';

  $select_review_length = "SELECT * FROM reviews";
  $review_query = mysqli_query($conn, $select_review_length);
  if (mysqli_num_rows($review_query) > 0) {
    $review_rows = mysqli_fetch_all($review_query);
    echo json_encode($review_rows);
  }
?>