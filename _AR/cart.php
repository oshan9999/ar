<?php
   require('header.php');
   $subTotal=0;
   ?>
<!-- Cart Items -->
<div class="container cart">
   <table>
      <tr>
         <th>Product</th>
         <th>Quantity</th>
         <th>Subtotal</th>
      </tr>
      <?php
         $c=0;
         if (isset($_SESSION['cart'])) {
         foreach ($_SESSION['cart'] as $key => $value) {
         $productArr=get_product($con,'','',$key);
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
                  <p><?php echo $pname?></p>
                  <span><?php echo $price?></span>
                  <br />
                  <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')">remove</a>
               </div>
            </div>
         </td>
         <td><input type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>" min="1"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')"> Update</a></td>
         <td><?php echo $total=$qty*$price?></td>
      </tr>
      <?php $subTotal=$subTotal+$total; }} ?>
   </table>
   <div class="total-price">
      <!--
         <table>
         <tr>
            <td>Subtotal</td>
            <td><?php echo $subTotal ?></td>
         </tr>
         <tr>
            <td>Tax</td>
            <td>$50</td>
         </tr>
         <tr>
            <td>Total</td>
            <td>$250</td>
         </tr>
      </table>
      -->
      <a href="<?php echo SITE_PATH?>checkout.php" class="checkout btn">Proceed To Checkout</a>
   </div>
</div>
<?php
   require('footer.php');
   ?>
<!-- Custom Scripts -->
<script src="./js/index.js"></script>
</body>
</html>