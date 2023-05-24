<?php
   require('header.php');
   if(!isset($_SESSION['USER_ID'])){
      echo"<script>
         alert('Please login!');
         window.location.href='login.php';
      </script>";
   }
?>

<section class="main-col">
 <div class="side-menu">
    <div class="header">Menu</div>
    <ul>
       <li><a href="my_order.php">My orders</a></li>
       <hr>
       <li><a href="tool/">Design</a></li>
       <hr>
       <li><a href="chat/">Message</a></li>
       <hr>
    </ul>
 </div>  
<div class="container cart">
<h2 style="text-align: center; margin-bottom: 1rem;">My Orders</h2>
   <table>
      <tr>
         <th>Order ID</th>
         <th>Order Date</th>
         <th>Address</th>
         <th>Payment Type</th>
         <th>Payment Status</th>
         <th>Order Status</th>
      </tr>
      <?php
        $uid=$_SESSION['USER_ID'];
        $res=mysqli_query($con,"SELECT * FROM `order` WHERE user_id='$uid'");
        while ($row=mysqli_fetch_assoc($res)) {
      ?>
      <tr>
         <td> <a href="my_order_details.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></a></td>
         <td><?php echo $row['added_on']?></td>
         <td><?php echo $row['address_one'].",".$row['address_two']?></td>
         <td><?php echo $row['payment_type']?></td>
         <td><?php echo $row['payment_status']?></td>
         <td><?php echo $row['order_status']?></td>
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
</section>

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