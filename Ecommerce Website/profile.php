<?php

include 'include/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   $username = $_SESSION['user_name'];
}else{
   $user_id = '';
   echo "<h3> Login to see your profile</h3>";
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>My Profile</title>
   

   <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'include/user_header.php'; ?>




   <div class="image">
      <img src="images/pic-1" alt="">
   </div>
   
   <div class="content">
   <h3>your name is:    <?php echo $username;?> </h3>








<?php include 'include/footer.php'; ?>


</body>
</html>