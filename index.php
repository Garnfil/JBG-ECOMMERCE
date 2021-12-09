<?php
session_start();
$sign = '';
$anc = '';

if ($_SESSION['fullname'] == '' && $_SESSION['email'] == '') {
  $sign = 'in';
  $anc = 'signin.php';
} else{
  $sign = 'out';
  $anc = 'includes/config.php?action=logout-user';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" href="css/home.css"></link>
  <script src="https://kit.fontawesome.com/0615dc2069.js" crossorigin="anonymous"></script>
	<title>JBG - SHOP</title>
</head>
<body>
	
	<div class="menu">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</div>
	
	<div class="head-span"></div>
	
	<div class="head-container">
		<a class="logo" href="">JBG</a>
		<ul class="nav-link">
			<li><a href="">Reviews</a></li>
			<li><a href="">About</a></li>
			<li><a href="">Contacts</a></li>
			<li><a class="sign-in" href='<?php echo $anc ?>'>Sign <?php echo $sign ?></a></li>
		</ul>
		<div class="side-head">
			<input type="search" class="search" placeholder="Search Product">
			<a class="cart" href=""><i class="fas fa-shopping-cart"></i></a>
		</div>
	</div>
	
		<div class="side-container">
			<div class="side-content">
				<h2>Categories</h2>
				<div class="categories">
					<div class="categorie">
						<div class="box active-box" onclick="onCategories('',this)"></div>
						<div class="categorie-name">All Items</div>
					</div>
					<div class="categorie">
						<div class="box" onclick="onCategories('11',this)"></div>
						<div class="categorie-name">T-Shirt</div>
					</div>
					<div class="categorie">
						<div class="box" onclick="onCategories('12',this)"></div>
						<div class="categorie-name">Dress</div>
					</div>
					<div class="categorie">
						<div class="box" onclick="onCategories('13', this)"></div>
						<div class="categorie-name">Men's Shoes</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="shop-container">
			<h1>Products</h1>
				<ul class="product-content">
				</ul>
		</div>
		<script src="js/home.js"></script>
</body>
</html>
