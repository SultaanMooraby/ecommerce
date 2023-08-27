<?php
session_start();

include 'include/connect.php';


if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
   
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>About</title>


   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'include/user_header.php'; ?>

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam veritatis minus et similique doloribus? Harum molestias tenetur eaque illum quas? Obcaecati nulla in itaque modi magnam ipsa molestiae ullam consequuntur.</p>
      </div>

   </div>

</section>

<?php 

include 'include/footer.php'; 

?>



</body>
</html>