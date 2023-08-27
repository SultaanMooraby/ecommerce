<?php

include 'include/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   echo "<h3 style=\"color:red\">You are already logged in</h3>";
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $name = $_POST['txt_username'];
   $name = htmlspecialchars($name);
   $email = $_POST['email'];
   $email = htmlspecialchars($email);
   $pass = sha1($_POST['txt_pass']);
   $pass = htmlspecialchars($pass);
   $cpass = sha1($_POST['txt_cpass']);
   $cpass = htmlspecialchars($cpass);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_user->execute([$email,]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      echo 'email already exists!';
   }else{
      if($pass != $cpass){
         echo 'confirm password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $cpass]);

         header('location:success/register_successful.php');

      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>


</head>
<body>
   
<?php include 'include/user_header.php'; ?>

<section class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <input type="text" name="txt_username" required placeholder="enter your username" maxlength="20"  class="box">
      <input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" >
      <input type="password" name="txt_pass" required placeholder="enter your password" maxlength="20"  class="box" >
      <input type="password" name="txt_cpass" required placeholder="confirm your password" maxlength="20"  class="box" >
      <input type="submit" value="register now" class="btn" name="submit">
      <p>already have an account?</p>
      <a href="user_login.php" class="option-btn">login now</a>
   </form>

</section>


<?php include 'include/footer.php'; ?>

</body>
</html>