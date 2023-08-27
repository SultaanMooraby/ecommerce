<?php

if(isset($_POST['add_to_cart'])){

   if($user_id == ''){
      header('location:user_login.php');
   }else{

      $pid = $_POST['pid'];
      $pid = htmlspecialchars($pid);
      $name = $_POST['name'];
      $name = htmlspecialchars($name);
      $price = $_POST['price'];
      $price = htmlspecialchars($price);
      $image = $_POST['image'];
      $image = htmlspecialchars($image);
      $qty = $_POST['qty'];
      $qty = htmlspecialchars($qty);

      $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE pid = ? AND user_id = ?");
      $check_cart_numbers->execute([$pid, $user_id]);

      if($check_cart_numbers->rowCount() > 0){
         header('location:cart.php');
      }else{

         $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
         $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
         header('location:cart.php');

         
      }

   }

}

?>