<?php 
include '../includes/config.php';
session_start();

if ($_SESSION['email'] == '' || $_SESSION['fullname'] == '') {
  header('location: ../signin.php');
}
//for user checkout purposes
$fullname = $_SESSION['fullname'];
$email = $_SESSION['email'];
$user_id = $_SESSION['uniqueid'];

// get product
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE product_id = '$id'";
$result = mysqli_query($conn, $sql);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($products as $product) {
  $product_name = $product['product_name'];
  $unique_id = $product['product_unique_id'];
  $product_image = $product['product_image'];
  $price = $product['price'];
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>JBG - BUY</title>
	<link rel="stylesheet" href="../css/action.css"></link>
</head>
<body>
	<div class="buy-container">
		<div class="buy-form">
			<div class="head-close">
				<div class="close">X</div>
			</div>
			<div class="buy-head">
				<img src="../images/<?php echo $product_image ?>" alt="">
				<div class="buy-info">
					<h1><?php echo $product_name ?></h1>
					<h2>Price: $<?php echo $price ?></h2>
				</div>
			</div>
			<form action="" method="POST" id="order-form">
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
			<input type="text" name="customer_address" placeholder="Adress" required>
			<input type="text" name="phone" placeholder="Contact Phone" required>
			<input type="hidden" name="item_name" value="<?php echo $product_name ?>">
			<input type="hidden" id="price" name="price" value="<?php echo $price ?>">
			<input type="hidden" name="product_id" value="<?php echo $unique_id ?>">
			<input type="hidden" name="customer_name" value="<?php echo $fullname ?>">
			<input type="hidden" name="customer_id" value="<?php echo $user_id ?>">
			<button class="check-out" type="submit">CHECK OUT</button>
			</form>
		</div>
	</div>
	
	<div class="checkout-container">
	  <div class="checkout-message">
	    <h1>Thankyou for your order!</h1>
	    <h2 class="total"></h2>
	    <p>We will contact you if your order is ready to receive. Thankyou!</p>
	    <a class="go-home" href="../index.php">HOME</a>
	  </div>
	</div>
	
	<script src="../js/shop.js"></script>
</body>
</html>
