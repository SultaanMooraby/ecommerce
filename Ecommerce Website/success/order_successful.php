<?php

session_start();

include '../include/connect.php';
include '../include/user_header.php';

if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $username= $_SESSION['user_name'];
 }else{
    $user_id = '';
 };
 
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Success!</title>
      <meta http-equiv = "refresh" content = "5; url = ../home.php" />
   </head>
   
   <body>
      <h1>Thank you for your order!</h2>
   </body>
</html>
<?php include '../include/footer.php'; ?>
