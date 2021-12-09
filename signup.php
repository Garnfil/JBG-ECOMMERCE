<?php 
session_start();
include 'includes/config.php';

if (isset($_POST['sign_up'])) {
  $errors = '';
  $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $uniqueid = rand(10000,100000);
  $password = password_hash($password, PASSWORD_DEFAULT);

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors = 'Email must be a valid email';
  }
  if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $fullname)) {
    $errors = 'Your Fullname is Invalid';
  }
  
  if ($errors != '') {
    // Errors
  } else {
    $sql = "INSERT INTO users(user_unique_id,fullname,email,password) VALUES('$uniqueid','$fullname','$email','$password')";
      
      if (mysqli_query($conn,$sql)) {
        header('location: signin.php');
      } else{
        echo 'Error Query: ' . mysqli_error($conn);
      }
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>JBG - SIGNUP</title>
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
	
	<div class="signup-container">
		<div class="signup-form">
			<div class="message">
				<?php echo $errors ?>
			</div>
			<h1>Sign Up</h1>
			<form action="" method="POST">
				<input type="text" name="fullname" placeholder="Fullname..." required>
				<input type="email" name="email" placeholder="Email..." required>
				<input type="password" name="password" placeholder="Password..." required>
				<button name="sign_up" class="signup-submit">SIGN UP</button>
			</form>
			<div>
				<label>Have an account?</label>
				<a class="signup-link" href="signin.php">Sign in</a>
			</div>
		</div>
	</div>
	<script src="js/action.js"></script>
</body>
</html>
