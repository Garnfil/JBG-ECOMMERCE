<?php 
include '../includes/config.php';

if ($_GET['action'] == 'edit_product') {
  $id = $_GET['id'];
  $sql = "SELECT * FROM products WHERE product_id = '$id'";
  $result = mysqli_query($conn, $sql);
  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
  foreach($products as $product){
    $product_name = $product['product_name'];
    $product_unique_id = $product['product_unique_id'];
    $product_image = $product['product_image'];
    $product_price = $product['price'];
    $product_id = $product['product_id'];
  }
} else{
  header('location: ../admin.php');
}

if (isset($_POST['edit_products'])) {
  
  $target_path = "../images/";
  $target_path = $target_path . basename( $_FILES['new_image']['name']);
  
  $id = $_POST['product_id'];
  $edit_name = $_POST['edit_product_name'];
  $unique_id = $_POST['edit_product_id'];
  $new_image = $_FILES['new_image']['name'];
  $old_img = $_POST['old_image'];
  $price = $_POST['edit_product_price'];
  
  if ($new_image != '') {
    $update_img = $new_image;
    $updated = move_uploaded_file( $_FILES['new_image']['tmp_name'], $target_path);
    
    if ($updated) {
      $sql = "UPDATE products SET product_unique_id = '$unique_id', product_name = '$edit_name', product_image = '$update_img', price = '$price' WHERE product_id = '$product_id'";
      if (mysqli_query($conn, $sql)) {
        header('location: ../admin.php');
      } else{
        echo mysqli_error($conn);
      }
    } else{
       echo "<script>alert('Fail to update image')</script>";
    }
  } else{
    $update_img = $old_img;
    $sql = "UPDATE products SET product_unique_id = '$unique_id', product_name = '$edit_name', product_image = '$update_img', price = '$price' WHERE product_id = '$product_id'";
      if (mysqli_query($conn, $sql)) {
          header('location: ../admin.php');
      } else{
        echo mysqli_error($conn);
      }
  }
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
  </head>

  <body>
	<!-- EDIT PRODUCTS -->
  				<div class="edit-product-form">
  					<div class="orders-form">
  					<h2>Edit products</h2>
  					<form action="" method="POST" enctype="multipart/form-data" id="product-edit-data">
  						<input type="text" name="edit_product_name" placeholder="Edit Products Name..." value='<?php echo $product_name ?>' required>
  						<input type="text" name="edit_product_id" placeholder="Edit Product ID..." value="<?php echo $product_unique_id ?>" required>
  					<input type="text" name="edit_product_price" value=" <?php echo $product_price ?>" required>	
  					<input type="file" name="new_image" value="">
  					<input type="hidden"name="old_image" value="<?php echo $product_image ?>">
  					<input type="hidden" name="product_id" value="<?php echo $product_id ?>">
  						<button class="submit-form" name="edit_products" type="submit">Submit</button>
  						<a href="../admin.php" class="cancel">Cancel</a>
  					</form>
  				 </div>
  				</div>
  				<!-- EDIT PRODUCTS -->
  </body>
</html>