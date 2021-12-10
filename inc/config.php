<?php 
session_start();
/*$localhost = 'sql112.epizy.com';
$username = 'epiz_30558676';
$password = 'OAoB0EW1SpZmPRP';
$db_name = 'epiz_30558676_jbg';*/

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