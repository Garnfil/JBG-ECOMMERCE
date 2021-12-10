<?php
session_start();
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
	<title>JBG - REVIEWS</title>
	<script src="https://kit.fontawesome.com/0615dc2069.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/home.css"></link>
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
		  <li><a href="index.php">Home</a></li>
			<li><a href="reviews.php">Reviews</a></li>
			<li><a href="about.html">About</a></li>
			<li><a class="sign-in" href='<?php echo $anc ?>'>Sign <?php echo $sign ?></a></li>
		</ul>
		<div class="side-head">
			<input type="search" class="search" placeholder="Search Product">
			<a class="cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
		</div>
	</div>
	
	<div class="reviews-container">
		<div class="reviews-buttons">
			<button class="rev-button active-rev" onclick="onRate('',this)">All</button>
			<button class="rev-button" onclick="onRate('5',this)">5/5</button>
			<button class="rev-button" onclick="onRate('4',this)">4/5</button>
			<button class="rev-button" onclick="onRate('3',this)">3/5</button>
			<button class="rev-button" onclick="onRate('2',this)">2/5</button>
			<button class="rev-button" onclick="onRate('1',this)">1/5</button>
		</div>
		<ul class="reviews-content">
			
		</ul>
		<div class="review-form">
			<form id="review-form-data">
				<textarea placeholder="Review..." id="review_mes" name="review_mes" rows="2"></textarea>
				<select name="rate">
					<option value="5">5</option>
					<option value="4">4</option>
					<option value="3">3</option>
					<option value="2">2</option>
					<option value="1">1</option>
				</select>
				<input type="hidden" id="name" value="<?php echo $_SESSION['fullname'] ?>">
				<button type="submit" class="rev-submit">Submit</button>
			</form>
		</div>
	</div>
	<script src="js/reviews.js"></script>
</body>
</html>
