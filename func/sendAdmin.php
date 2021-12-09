<?php 
include '../includes/config.php';

$errors = array('email'=>"",'fullname'=>"");
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$unique_id = rand(10000,100000);
$password = password_hash($password, PASSWORD_DEFAULT);


  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Email must be a valid email';
  }
  if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $user_name)) {
    $errors['fullname'] = 'Your name must be Letters only';
  }
  
  print_r($errors);
  
  if (array_filter($errors)) {
    //No Errors
  } else {
    $sql = "INSERT INTO admin(admin_unique_id,username,email,password) VALUES('$unique_id','$user_name','$email','$password')";
      
      if (mysqli_query($conn,$sql)) {
        //success
      } else{
        echo 'Error Query: ' . mysqli_error($conn);
      }
  }

?>