<?php 
session_start();
$localhost = 'localhost:3306';
$username = 'root';
$password = 'root';
$db_name = 'jbg_database';

//connect to database
$conn = mysqli_connect($localhost, $username, $password, $db_name);

if (mysqli_error($conn)) {
  echo 'Error Connection';
}

if ($_GET['action'] == 'logout') {
  $_SESSION['username'] = '';
  header('location: ../admin-login.php');
}

if ($_GET['action'] == 'logout-user') {
  $_SESSION['fullname'] = '';
  $_SESSION['email'] = '';
  $_SESSION['uniqueid'] = '';
  session_destroy();
  header('location: ../index.php');
}


?>