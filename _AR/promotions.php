<?php
    require('header.php');
  ?>

  <!-- PRODUCTS -->

  <section class="section products">
    <div class="products-layout container">
    <div class="col-1-of-4">
        <div>
          <div class="block-title">
            <h3>Category</h3>
          </div>

          <ul class="block-content">
            <?php
              $get_cat=getCategories($con);
              foreach ($get_cat as $list) {              
            ?>
            <li>
              <label for="">
              <span><a href="catProduct.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></span>
                <small></small>
              </label>
              <?php
              }
              ?>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-3-of-4">
        <form action="">
          <div class="item">
            <label for="sort-by">Sort By</label>
            <select name="sort-by" id="sort-by">
              <option value="title" selected="selected">Name</option>
              <option value="number">Price</option>
              <option value="search_api_relevance">Relevance</option>
              <option value="created">Newness</option>
            </select>
          </div>
          <div class="item">
            <label for="order-by">Order</label>
            <select name="order-by" id="sort-by">
              <option value="ASC" selected="selected">ASC</option>
              <option value="DESC">DESC</option>
            </select>
          </div>
          <a href="">Apply</a>
        </form>

        <div class="product-layout">
          <!--Get product function-->
          <?php 
            $get_product=get_promote_product($con,'latest');
            foreach($get_product as $list){
          ?>
          <div class="product">
            <div class="img-container">
            <div class="promo">
                <span class="discount">10%</span>
              </div>
            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="" />
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
            <a href="promoproductDetails.php?id=<?php echo $list['id']?>&type=0"><?php echo $list['name']?></a>
              <div class="price">
              <span><?php echo 'Rs '.$list['price'];?></span>
              </div>
            </div>
          </div>
          <?php }?>
        </div>

        <!-- PAGINATION -->
        <ul class="pagination">
          <span>1</span>
          <span>2</span>
          <span class="icon">››</span>
          <span class="last">Last »</span>
        </ul>
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
</body>
</html>