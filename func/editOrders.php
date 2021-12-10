<?php 
include '../inc/config.php';

/*if ($_GET['action'] == 'edit_order') {
  $id = $_GET['id'];
  $sql = "SELECT * FROM orders WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  foreach($orders as $order){
    $order_name = $order['order_name'];
    $quantity = $order['quantity'];
    $price = $order['price'];
    $total = $order['total'];
    $order_product_id = $order['order_product_id'];
    $order_user_id = $order['order_user_id'];
    $fullname = $order['fullname'];
    $address = $order['address'];
    $contact = $order['contact'];
  }
} else{
  header('location: ../admin.php');
}

if (isset($_POST['edit_order'])) {
    $order_name = $_POST['item_name'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $total = $price * $quantity;
    $order_product_id = $_POST['product_id'];
    $order_user_id = $_POST['customer_id'];
    $fullname = $_POST['customer_name'];
    $address = $_POST['customer_address'];
    $contact = $_POST['phone'];
    
    $sql = "UPDATE orders SET order_user_id = '$order_user_id', order_name = '$order_name', size = '$size', quantity = '$quantity', price = '$price', total = '$total', order_product_id = '$order_product_id', fullname = '$fullname', address = '$address', contact = '$contact' WHERE order_user_id = '$order_user_id'";
    
    if (mysqli_query($conn, $sql)) {
      header('location: ../admin.php');
    } else{
      echo mysqli_error($conn);
    }
}
*/
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Order</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
<div class="edit-orders-form">
  				<div class="orders-form">
  					<h2>Add order</h2>
  					<form action="" method="POST" id="order-add-data">
  						<input type="text" name="item_name" id="item_name" value='<?php echo $order_name ?>'>
              <input type="radio" class="radio" name="size" value="S"/>
  						<label>S</label>
  						<input type="radio" class="radio" name="size" value="M" />
  						<label>M</label>
  						<input type="radio" class="radio" name="size" value="L" />
  						<label>L</label>
  						<input type="text" name="quantity" id="quantity" value="<?php echo $quantity ?>">
  						<input type="text" name="price" id="price" placeholder="Price..." value="<?php echo $price ?>">
  						<input type="text" name="product_id" id="product_id" value="<?php echo $order_product_id ?>" >
  						<input type="text" name="customer_id" id="customer_id" value="<?php echo $order_user_id ?>" >
  						<input type="text" name="customer_name" id="customer_name" value="<?php echo $fullname ?>">
  						<input type="text" name="customer_address" id="customer_address" value="<?php echo $address ?>">
  						<input type="text" name="phone" id="phone" value="<?php echo $contact ?>" placeholder="Contact...">
  							<div>
  						<button class="submit-form" name="edit_order" type="submit">Submit</button>
  						<button type="button" class="cancel">Cancel</button>
  						</div>
  					</form>
  				</div>
  		  </div>
  </body>
</html>