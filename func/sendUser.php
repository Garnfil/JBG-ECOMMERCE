<?php 
include '../includes/config.php';

$errors = array('email'=>"",'fullname'=>"");
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$unique_id = rand(10000,100000);
$password = password_hash($password, PASSWORD_DEFAULT);


  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Email must be a valid email';
  }
  if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $fullname)) {
    $errors['fullname'] = 'Your name must be Letters only';
  }
  
  if (array_filter($errors)) {
    //No Errors
  } else {
    $sql = "INSERT INTO users(user_unique_id,fullname,email,password) VALUES('$unique_id','$fullname','$email','$password')";
      
      if (mysqli_query($conn,$sql)) {
        //success
      } else{
        echo 'Error Query: ' . mysqli_error($conn);
      }
  }

?>