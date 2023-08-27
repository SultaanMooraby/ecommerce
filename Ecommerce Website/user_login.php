<?php


session_start();

include 'include/connect.php';

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   $username = $_SESSION['user_name'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = htmlspecialchars($email);
   $pass = sha1($_POST['txt_pass']);
   $pass = htmlspecialchars($pass);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_name'] = $row['name'];
      header('location:home.php');
   }else{


      echo '<h3>incorrect username or password!</h3>';


   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>


   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'include/user_header.php'; ?>

<?php
if(isset($_SESSION['user_id']))
{ 
  echo "<h3 style=\"color:red\">You are already logged in</h3>";
    
}//end if
else{
?>


<section class="form-container">

   <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
      <h3>login now</h3>
      <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" >
      <input type="password" name="txt_pass" required placeholder="enter your password" maxlength="20"  class="box">
      <input type="submit" value="login now" class="btn" name="submit">
      <p>don't have an account?</p>
      <a href="user_register.php" class="option-btn">register now</a>
   </form>

</section>


<?php
}
?>


<?php include 'include/footer.php'; ?>


</body>
</html>