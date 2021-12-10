<?php 
include '../inc/config.php';

  /*$target_path = "../images/";
  $target_path = $target_path . basename( $_FILES['add_product_image']['name']);
  
  $product_name = $_POST['add_product_name'];
  $product_id = $_POST['add_product_id'];
  $product_image = $_FILES["add_product_image"]["name"];
  
  $sql = "INSERT INTO products(product_unique_id,product_name,product_image) VALUES('$product_id','$product_name','$product_image')";
  
    if (move_uploaded_file($_FILES['add_product_image']['tmp_name'], $target_path))  {
      if (mysqli_query($conn,$sql)) {
        echo "Success!";
      } else{
         echo mysqli_error($conn);
      }
    }else{
       echo 'Failed to Upload';
    }*/

?>