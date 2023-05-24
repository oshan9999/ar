<?php
   require('connection.inc.php');
   require('functions.inc.php');
   require('add_to_cart_inc.php');

  $obj=new add_to_cart();
  $totalProduct=$obj->totalProduct();
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.png" type="image/png" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
 <!-- ======== Swiper Js ======= -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.css"
    />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.8/css/boxicons.min.css' rel='stylesheet'>
  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="css/styles.css" />
  <title>Landzcapy</title>
</head>

<body>
<!-- Navigation -->
<nav class="nav">
    <div class="wrapper container">
      <div class="logo"><a href="">
        <img src="./images/logo.png" alt="">
      </a>
      </div>
      <ul class="nav-list">
        <div class="top">
          <label for="" class="btn close-btn"><i class="fas fa-times"></i></label>
        </div>
        <li><a href="index.php">Home</a></li>
        <li>
          <a href="products.php" class="desktop-item">Products <span><i class="fas fa-chevron-down"></i></span></a>
          <input type="checkbox" id="showdrop1" />
          <label for="showdrop1" class="mobile-item">Products <span><i class="fas fa-chevron-down"></i></span></label>
          <ul class="drop-menu1">
            <li><a href="promotions.php">Promotions</a></li>
            <li><a href="">New designs and trends</a></li>
          </ul>
        </li>
        <li><a href="packages.php">Packages</a></li>
        <li><a href="">Before & after</a></li>
        <!-- icons -->
        <li class="icons">
          <a href="cart.php">
            <span>
            <img src="./images/shoppingBag.svg" alt="" />
            <small class="count d-flex"><?php echo $totalProduct?></small>
          </span>
          </a>
          <?php
            if (isset($_SESSION['USER_LOGIN'])) {
              echo'<li>
              <a href="logout.php">Logout</a> <a href="my_order.php" class="desktop-item">My Orders</a>
            </li>';
            }else{
              echo'<li>
              <a href="login.php">Login/Register</a>
            </li>';
            }
          ?>
          <span><img src="./images/search.svg" class="search" alt="" /></span>
        </li>
      </ul>
      <label for="" class="btn open-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav>



