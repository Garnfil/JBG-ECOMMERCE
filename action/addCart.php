<?php 
include '../includes/config.php';
session_start();

if ($_SESSION['email'] == '' || $_SESSION['fullname'] == '') {
  header('location: ../signin.php');
}

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE product_id = '$id'";
$result = mysqli_query($conn, $sql);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($products as $product) {
  $product_name = $product['product_name'];
  $product_image = $product['product_image'];
  $price = $product['price'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>JBG - ADDCART</title>
	<link rel="stylesheet" href="../css/action.css"></link>
</head>
<body>
	<div class="add-cart-container">
		<div class="add-cart-form">
			<div class="head-close">
				<div class="close">X</div>
			</div>
			<img src="../images/<?php echo $product_image ?>" alt="">
			<div class="add-cart-info">
				<h1><?php echo $product_name ?></h1>
				<h3>Price: $<?php echo $price ?></h3>
				<form action="" method="POST">
					<div class="size-quantity">
						<select name="size" id="size">
							<option value="S">S</option>
							<option value="M">M</option>
							<option value="L">L</option>
						</select>
						<div class="quantity-div">
							<span class="minus">-</span>
							<input id="quantity" type="text" name="quantity" readonly>
							<span class="add">+</span>
						</div>
					</div>
					<button class="add-to-cart">Add to Cart</button>
					<input name="price" type="hidden">
					<input name="product" type="hidden">
					<input name="product_image" type="hidden">
				</form>
			</div>
		</div>
	</div>
<script src="../js/shop.js"></script>
</body>
</html>
