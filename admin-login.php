<?php 
session_start();
include 'inc/config.php';

if (isset($_POST['admin_login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $get_data = "SELECT * FROM admin WHERE username = '$username' && password = '$password'";
  $result = mysqli_query($conn,$get_data);
  
  if (mysqli_num_rows($result) < 1) {
    echo "<script>alert('Your username or password is incorrect')</script>";
  } else{
    $_SESSION['username'] = $username;
    header('location: admin.php');
  }
}
?>




<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin-Login</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <div class="log-container">
      <div class="log-form">
      		<h1>Admin</h1>
      		<form action="" method="POST">
      			<input type="text" placeholder="Username..." name="username">
      			<input type="password" placeholder="Password..." name="password">
      			<button name="admin_login" type="submit">Log in</button>
      		</form>
      </div>
    </div>
  </body>
</html>
