<?php 
session_start();
include 'includes/config.php';
$message = '';

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $s = "SELECT * FROM users WHERE email = '$email'";
  $query = mysqli_query($conn,$s);
  if (mysqli_num_rows($query) > 0) {
    while($row = mysqli_fetch_array($query)) {
      if (password_verify($password, $row['password'])) {
        $_SESSION['uniqueid'] = $row['user_unique_id'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION ['email'] = $row['email'];
        header('location: index.php');
      } else {
        $message = 'Invalid Email or Password! Please Try Again';
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>JBG - SIGNIN</title>
	<link rel="stylesheet" href="css/home.css"></link>
	<script src="https://kit.fontawesome.com/0615dc2069.js" crossorigin="anonymous"></script>
</head>
<body>
  
<div class="menu">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</div>
	
	<div class="head-span"></div>
	
	<div class="head-container">
		<a class="logo" href="index.php">JBG</a>
		<ul class="nav-link">
			<li><a href="">Reviews</a></li>
			<li><a href="">About</a></li>
			<li><a href="">Contacts</a></li>
			<li><a class="sign-in" href="signin.php">Sign in</a></li>
		</ul>
		<div class="side-head">
			<input type="search" class="search" placeholder="Search Product">
			<a class="cart" href=""><i class="fas fa-shopping-cart"></i></a>
		</div>
	</div>
  
	<div class="signin-container">
		<div class="signin-form">
	    <div class="message">
			  <?php echo $message ?>
		  </div>
			<h1>Sign In</h1>
			<form action="" method="POST">
				<input required name="email" type="email" placeholder="Email...">
				<input required="" type="password" name="password" placeholder="Password...">
				<button class="signin-submit" name="login" type="submit">SIGN IN</button>
			</form>
			<div>
				<label>Dont have an account?</label>
				<a class="signup-link" href="signup.php">Sign up</a>
			</div>
		</div>
	</div>
	
	<script src="js/action.js" charset="utf-8"></script>
</body>
</html>
