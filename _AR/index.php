<?php
    require('header.php');
  ?>
<!--Hero Section-->
<div class="hero">
    <div class="row">
      <div class="swiper-container slider-1">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="./images/banner1.webp" alt="" />
            <div class="content">
              <h1>We plan your
                <br/>
                
                <span>Garden</span>
              </h1>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti ad natus facilis magni corporis alias.</p>

              <a href="#">View Packages</a>
            </div>
          </div>

          <div class="swiper-slide">
            <img src="./images/banner2.webp" alt="hero image" />
            <div class="content">
              <h1>We plan your
                <br/>
                
                <span>Garden</span>
              </h1>
              <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corrupti ad natus facilis magni corporis alias.</p>

              <a href="#">View Packages</a>
            </div>
          </div>  
        </div>
      </div>
    </div>
<!--Hero Section-->


    <!-- Carousel Navigation -->
    <div class="arrows d-flex">
        <div class="swiper-prev d-flex">
          <i class="bx bx-chevrons-left swiper-icon"></i>
        </div>
        <div class="swiper-next d-flex">
          <i class="bx bx-chevrons-right swiper-icon"></i>
        </div>
    </div>
  </div>
<!--Search Section-->
  <section class="search">
    <div class="search-input">
      <form action="result.php" method="post">
      <input type="text" name="query" id="query" placeholder="Enter location" autocomplete="off" required>
      <div class="auto-com" id="auto-com">
      </div>  
      <button type="submit" class="search-icon"><i class="fas fa-search"></i></button>
      </form>
    </div>
  </section>

  <!-- Featured -->
  <section class="section featured">
    <div class="title">
      <h2>Featured Products</h2>
      <span>Select from the premium product brands and save plenty money</span>
    </div>

    <div class="row container">
      <div class="swiper-container slider-2">
        <div class="swiper-wrapper">
          <?php
              $get_product=get_product($con,'latest',4,'','15');
              foreach($get_product as $list){
          ?>
          <div class="swiper-slide">
            <div class="product">
              <div class="img-container">
                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="" />
                <div class="addCart">
                  <i class="fas fa-shopping-cart"></i>
                </div>

                <ul class="side-icons">
                  <span><i class="fas fa-camera"></i></span>
                  <span><i class="far fa-heart"></i></span>
                  <span><i class="fas fa-sliders-h"></i></span>
                </ul>
              </div>
              <div class="bottom">
              <a href="productDetails.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a>
                <div class="price">
                <span><?php echo 'Rs '.$list['price'];?></span>
                </div>
              </div>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </div>

     <!-- Carousel Navigation -->
    <div class="arrows d-flex">
       <div class="custom-next d-flex">
          <i class="bx bx-chevrons-right swiper-icon"></i>
        </div>
        <div class="custom-prev d-flex">
          <i class="bx bx-chevrons-left swiper-icon"></i>
        </div>
    </div>
  </section>

  <!-- Products -->
  <section class="section products">
    <div class="title">
      <h2>New Products</h2>
      <span>Select from the premium product brands and save plenty money</span>
    </div>

     <!--QR code-->
     <div class="popup">
  <span class="popuptext" id="myPopup"><img src="images/qr-code.png" alt="" srcset="">Scan the QR code</span>
</div>


    <div class="product-layout">
    <?php
        $get_product=get_product($con,'latest',4);
        foreach($get_product as $list){
      ?>
      <div class="product">
        <div class="img-container">
          <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-camera" onclick="myFunction()"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
          <a href="productDetails.php?id=<?php echo $list['id']?>"><?php echo $list['name']?></a>
          <div class="price">
            <span><?php echo 'Rs '.$list['price'];?></span>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
      
    </div>
  </section>

 


  <!--
  <section class="section advert">
    <div class="advert-layout container">
      <div class="item ">
        <img src="./images/banner1.jpg" alt="">
        <div class="content left">
          <span>Exclusive Sales</span>
          <h3>Spring Collections</h3>
          <a href="">View Collection</a>
        </div>
      </div>
      <div class="item">
        <img src="./images/banner2.jpg" alt="">
        <div class="content  right">
          <span>New Trending</span>
          <h3>Designer Bags</h3>
          <a href="">Shop Now </a>
        </div>
      </div>
    </div>
  </section>

  -->

  <!-- PACKAGES -->
  
  <section class="package">

    <div class="title">
      <h2>Packages</h2>
      <span>Select from the premium product brands and save plenty money</span>
    </div>  

  <div class="package-container">
    <div class="card">
      <div class="bg-image">
        <img src="./images/packageimg1.jpg" alt="" srcset="">
      </div>

      <div class="info">
        <h3>Botanical</h3>
        <span>Rs 649</span>
        <p>Custom planting design <span>for your</span> entire property.</p>
        <p id="p1">*Plants hand selected by a talented landscape</p> <p id="p2">designer (up to 1/2 acre)</p>
      </div>

      <div class="btn">
        <a href="package_one.php" class="view_more">View Details</a>
      </div>
    </div>

    <div class="card">
      <div class="bg-image">
        <img src="./images/packageimg2.jpg" alt="" srcset="">
      </div>

      <div class="info">
        <h3>Full Yard</h3>
        <span>Rs 1495</span>
        <p>Custom planting design <span>for your</span> entire property.</p>
        <p id="p1">*Plants hand selected by a talented landscape</p> <p id="p2">designer (up to 1/2 acre)</p>
      </div>

      <div class="btn">
        <a href="package_one.php" class="view_more">View Details</a>
      </div>
    </div>

    <div class="card">
      <div class="bg-image">
        <img src="./images/packageimg3.jpg" alt="" srcset="">
      </div>

      <div class="info">
        <h3>Front or Back Yard</h3>
        <span>Rs 995</span>
        <p>Custom planting design <span>for your</span> entire property.</p>
        <p id="p1">*Plants hand selected by a talented landscape</p> <p id="p2">designer (up to 1/2 acre)</p>
      </div>

      <div class="btn">
        <a href="package_one.php" class="view_more">View Details</a>
      </div>
    </div>
  </div>
  </section>

  
  <?php
    require('footer.php');
  ?>

  <!-- ======== SwiperJS ======= -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.7.5/swiper-bundle.min.js"></script>
  <!-- Custom Scripts -->
  <script src="./js/slider.js"></script>
  <script src="./js/index.js"></script>
  <script>

    </script>
</body>
</html>

