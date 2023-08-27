<?php

session_start();
include '../include/connect.php';
include '../include/user_header.php';


if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $username= $_SESSION['user_name'];
 }else{
    $user_id = '';
    $username='';
 };
 
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Success!</title>
      <meta http-equiv = "refresh" content = "5; url = ../user_login.php" />
   </head>
   
   <body>
      <p>Thank you for registering <?php echo $username;?>!</p>
   </body>
</html>
<?php include '../include/footer.php'; ?>
