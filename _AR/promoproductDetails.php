<?php
  require('header.php');
  $product_id=mysqli_real_escape_string($con,$_GET['id']);
  $get_product=get_promote_product($con,'','',$product_id);
  $noProduct=0;
  //$noPromoProduct=0;
  $noProduct=$obj->noProduct();
  $noPromoProduct=$obj->noPromoProduct();
?>
  <!-- Product Details -->
<section class="section product-detail">
    <div class="details container">
      <div class="left">
        <div class="main">
          <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>" alt="">
        </div>
        <div class="thumbnails">
          <div class="thumbnail">
            <img src="./images/product-2.jpg" alt="" />
          </div>
          <div class="thumbnail">
            <img src="./images/product-3.jpg" alt="" />
          </div>
          <div class="thumbnail">
            <img src="./images/product-4.jpg" alt="" />
          </div>
          <div class="thumbnail">
            <img src="./images/product-5.jpg" alt="" />
          </div>
        </div>
      </div>
      <div class="right">
        <span></span>
        <h1><?php echo $get_product['0']['name']?></h1>
        <div class="price"><?php echo $get_product['0']['price']?></div>
        <form>
          <div>
            <input type="number" class="qty" id="qty">
          </div>
        </form>

        <form class="form">
          <a href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')" class="addCart">Add To Cart</a>
          <a href="javascript:void(0)" onclick="compare_product('<?php echo $get_product['0']['id']?>','addPromo','promo')" class="addCompare">Add To Compare</a>
        </form>
        <h3>Product Detail</h3>
        <p>
        <?php echo $get_product['0']['description']?>
        </p>
      </div>
    </div>
  </section>

 




  <!-- Related Products -->

  <section class="section related-products">
    <div class="title">
      <h2>Related Products</h2>
      <span>Select from the premium product brands and save plenty money</span>
    </div>
    <div class="product-layout container">
      <div class="product">
        <div class="img-container">
          <img src="./images/product-1.jpg" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
          <a href="">Bambi Print Mini Backpack</a>
          <div class="price">
            <span>$150</span>
          </div>
        </div>
      </div>
      <div class="product">
        <div class="img-container">
          <img src="./images/product-2.jpg" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
          <a href="">Bambi Print Mini Backpack</a>
          <div class="price">
            <span>$150</span>
          </div>
        </div>
      </div>
      <div class="product">
        <div class="img-container">
          <img src="./images/product-3.jpg" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
          <a href="">Bambi Print Mini Backpack</a>
          <div class="price">
            <span>$150</span>
          </div>
        </div>
      </div>
      <div class="product">
        <div class="img-container">
          <img src="./images/product-4.jpg" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
          <a href="">Bambi Print Mini Backpack</a>
          <div class="price">
            <span>$150</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="compare">
<a href="show_compare.php"><span>
          <small class="pcount d-flex"><?php echo $noPromoProduct?></small>
            <i class="fas fa-balance-scale"></i>          
</span>
</a>
</div>


  <?php
    require('footer.php');
  ?>

  <!-- Custom Scripts -->
  <script src="./js/index.js"></script>
</body>

</html>