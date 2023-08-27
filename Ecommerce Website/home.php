<?php


session_start();
include 'include/connect.php';

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}
;
include 'include/add_to_cart.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'include/user_header.php'; ?>

   <div class="home-bg">

      <section class="home">

         <div class="swiper home-slider">

            <div class="swiper-wrapper">

               <div class="swiper-slide slide">
                  <div class="image">
                     <img src="images/home-img-1.png" alt="">
                  </div>
                  <div class="content">
                     <span>upto 50% off</span>
                     <h3>latest smartphones</h3>
                     <a href="shop.php" class="btn">shop now</a>
                  </div>
               </div>

            </div>

      </section>

   </div>

   <section class="home-products">

      <h1 class="heading">Latest Products</h1>

      <div class="swiper products-slider">

         <div class="swiper-wrapper">

            <?php
            $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 3");
            $select_products->execute();
            if ($select_products->rowCount() > 0) {
               while ($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)) {
                  ?>
                  <form action="" method="post" class="swiper-slide slide">
                     <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
                     <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
                     <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
                     <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">

                     <a href="item.php?pid=<?= $fetch_product['id']; ?>"><img
                           src="item_image/<?= $fetch_product['image_01']; ?>" alt=""></a>
                     <div class="name">
                        <?= $fetch_product['name']; ?>
                     </div>
                     <div class="flex">
                        <div class="price"><span>Rs</span>
                           <?= $fetch_product['price']; ?><span></span>
                        </div>
                        <input type="number" name="qty" class="qty" min="1" max="99"
                           onkeypress="if(this.value.length == 2) return false;" value="1">
                     </div>
                     <input type="submit" value="add to cart" class="btn" name="add_to_cart" onclick="">
                  </form>
                  <?php
               }
            } else {
               echo '<p class="empty">no products added yet!</p>';
            }
            ?>

         </div>
      </div>

   </section>

   <?php include 'include/footer.php'; ?>

   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
   <script>
      var swiper = new Swiper(".products-slider", {
         spaceBetween: 20,
         breakpoints: {
            550: {
               slidesPerView: 2,
            },
            768: {
               slidesPerView: 2,
            },
            1024: {
               slidesPerView: 3,
            },
         },
      });

   </script>

</body>

</html>