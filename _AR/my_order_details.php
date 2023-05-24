<?php
   require('header.php');
   $order_id=get_safe_value($con,$_GET['id']);
?>

<div class="container cart">
   <table>
      <tr>
         <th>Product Name</th>
         <th>Product Image</th>
         <th>Qty</th>
         <th>Price</th>
         <th>Total Price</th>
      </tr>
      <?php
        $uid=$_SESSION['USER_ID'];
        $res=mysqli_query($con,"SELECT DISTINCT(order_detail.id),order_detail.*,product.name,product.image 
        FROM order_detail,product,`order` WHERE 
        order_detail.order_id='$order_id' AND `order`.user_id='$uid' 
        AND product.id=order_detail.product_id");
        while ($row=mysqli_fetch_assoc($res)) {
      ?>
      <tr>
         <td><?php echo $row['name']?></td>
         <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
         <td><?php echo $row['qty']?></td>
         <td><?php echo $row['price']?></td>
         <td><?php echo $row['qty']*$row['price']?></td>
      </tr>
      <?php   }?>
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
   </div>
</div>

<?php
   require('footer.php');
   ?>
<!-- Custom Scripts -->
<script src="./js/index.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</body>
</html>