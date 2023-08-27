
<?php
if(isset($_SESSION['user_id'])){ 
  $username = $_SESSION['user_name']; 
}
?>
<div class="page-header">


  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">

    <a class="navbar-brand" href="home.php">Tech World</a>
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" href="shop.php">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php">Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About Us</a>
      </li>
    </ul>


    <div class="d-flex flex-row-reverse bg-secondary">
        <ul class="navbar-nav">
          
        <?php
  if(isset($_SESSION['user_id'])){ echo '
              <li class="nav-item">
              <a class="nav-link" href="profile.php">Log in as '; echo $username; echo'</a>
            </li>
              <li class="nav-item">
            <a class="nav-link" href="user_logout.php">Log out</a>
          </li>';
  }
          else{   echo' 
            <li class="nav-item">
            <a class="nav-link" href="user_login.php">Login</a>
          </li>';
        }
        ?>
      </ul>
      
  

    </div>
  </nav>


</div>