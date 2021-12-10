<?php 
session_start();
if ($_SESSION['email'] == "") {
  header('location: signin.php');
}

$sign = '';
$anc = '';

if ($_SESSION['fullname'] == '' && $_SESSION['email'] == '') {
  $sign = 'in';
  $anc = 'signin.php';
} else{
  $sign = 'out';
  $anc = 'inc/config.php?action=logout-user';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>JBG - CART</title>
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
		  <li><a href="index.php">Home</a></li>
			<li><a href="reviews.php">Reviews</a></li>
			<li><a href="about.html">About</a></li>
			<li><a class="sign-in" href='<?php echo $anc ?>'>Sign <?php echo $sign ?></a></li>
		</ul>
		<div class="side-head">
			<input type="search" class="search" placeholder="Search Product">
			<a class="cart" href=""><i class="fas fa-shopping-cart"></i></a>
		</div>
	</div>
	
	<div class="cart-container">
		<h1>Carts</h1>
		<ul class="cart-content"></ul>
	</div>
	
	<script src="js/cart.js"></script>
</body>
</html>
