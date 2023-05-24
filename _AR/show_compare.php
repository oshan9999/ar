<?php
   require('header.php');
   $subTotal=0;
   //unset($_SESSION['comp']);
   ?>
<!-- Cart Items -->
<div class="container cart">
   <table border="1">
      <tr>
         <th>Image</th>
         <th>Product Name</th>
         <th>Material</th>
         <th>Size</th>
         <th>Price</th>
         <th>Action</th>
      </tr>
      <?php
         $c=0;
      if (isset($_SESSION['comp'])) {
         foreach ($_SESSION['comp'] as $key => $value) {
         $productArr=get_product($con,'','',$key);
         $pname=$productArr[0]['name'];
         $mrp=$productArr[0]['mrp'];
         $price=$productArr[0]['price'];
         $image=$productArr[0]['image'];
         $qty=$value['qty'];
         $material=$productArr[0]['meta_title'];
         $size=$productArr[0]['meta_desc']; 
         ?>
      <tr>
         <td>
            <div class="cart-info">
               <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="">
               <div>
                 
                  <span></span>
                  <br/>
               </div>
            </div>
         </td>
         <td> <p><?php echo $pname?></p></td>
         <td><?php echo $material?></td>
         <td><?php echo $size?></td>
         <td><?php echo $price?></td>
         <td><a href="javascript:void(0)" onclick="compare_product('<?php echo $key?>','remove')">remove</a></td>
      </tr>
      <?php  }
            }
      ?>
            <?php
         $c=0;
      if (isset($_SESSION['promoComp'])) {
         foreach ($_SESSION['promoComp'] as $key => $value) {
         $productArr=get_promote_product($con,'','',$key);
         $pname=$productArr[0]['name'];
         $mrp=$productArr[0]['mrp'];
         $price=$productArr[0]['price'];
         $image=$productArr[0]['image'];
         $qty=$value['qty'];
          
         ?>
      <tr>
         <td>
            <div class="cart-info">
               <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="">
               <div>
                 
                  <span></span>
                  <br />
               </div>
            </div>
         </td>
         <td> <p><?php echo $pname?></p></td>
         <td><?php echo $price?></td>
         <td><a href="javascript:void(0)" onclick="compare_product('<?php echo $key?>','remove')">remove</a></td>
      </tr>
      <?php  }
            }
      ?>
   </table>
</div>



<?php
   require('footer.php');
   ?>
<!-- Custom Scripts -->
<script src="./js/index.js"></script>
</body>
</html>