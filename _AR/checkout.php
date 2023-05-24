<?php
$subTotal=0;
   require('header.php');
   if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
?>
  <script>
     window.location.href='index.php';
  </script>
  <?php
   }

   $cart_total=0;
   //Checkout Form submit
   if(isset($_POST['submit'])){
      $first_name=get_safe_value($con,$_POST['fname']);
      $last_name=get_safe_value($con,$_POST['lname']);
      $company=get_safe_value($con,$_POST['companyName']);
      $country=get_safe_value($con,$_POST['country']);
      $addressOne=get_safe_value($con,$_POST['addressOne']);
      $addressTwo=get_safe_value($con,$_POST['addressTwo']);
      $city=get_safe_value($con,$_POST['city']);
      $state=get_safe_value($con,$_POST['state']);
      $phone=get_safe_value($con,$_POST['phone']);
      $email=get_safe_value($con,$_POST['email']);
      $payType=get_safe_value($con,$_POST['paytype']);
      //Get the user id 
      $user_id=$_SESSION['USER_ID'];
      
      
      foreach ($_SESSION['cart'] as $key => $value) {
         $productArr=get_product($con,'','',$key);
         $price=$productArr[0]['mrp'];
         $qty=$value['qty'];
         $cart_total=$cart_total+($price*$qty);
      }
      $total_price=$cart_total;

      //Checking the payment type
      $payment_status="pending";
      if($payType=="COD") {
         $payment_status="success";
      }
      $order_status="pending";
      $added_on=date('Y-m-d h:i:s');

      $sql=mysqli_query($con,"INSERT INTO `order`(user_id,first_name,last_name,company,country,address_one,address_two,city,state,phone,email,payment_type,total_price,payment_status,order_status,added_on)
      VALUES('$user_id','$first_name','$last_name','$company','$country','$addressOne','$addressTwo','$city','$state','$phone','$email','$payType','$total_price','$payment_status','$order_status','$added_on')");

      $order_id=mysqli_insert_id($con);

      foreach($_SESSION['cart'] as $key=>$val){
         $productArr=get_product($con,'','',$key);
         $price=$productArr[0]['mrp'];
         $qty=$val['qty'];

         mysqli_query($con,"INSERT INTO `order_detail`(order_id,product_id,qty,price,added_on) VALUES ('$order_id','$key','$qty','$price','$added_on')");
      }
      if($payType=="paypal"){
            $_SESSION['tot']=$total_price;
            header('location:paypal/');
      }

      if(!$sql){
         echo "Fialed".mysqli_error($con);
      }else{
         unset($_SESSION['cart']);
         ?> <script>
               window.location.href='thankyou.php';
         </script>
         <?php
      }
   }
?>   
<?php if(!isset($_SESSION['USER_LOGIN'])){?>
   <section class="login-form" id="login-form">
   <div class="row">
      <div class="login">
         <h1>Login</h1>
         <form  method="POST">
            <div class="inputBox">
               <h3>Username</h3>
               <input type="text" name="username" id="username" placeholder="User name">
            </div>
            <div class="inputBox">
               <h3>Password</h3>
               <input type="password" name="pass" id="pass" placeholder="Password">
            </div>
            <input type="button" class="btn" value="Login" onclick="user_login()">
         </form>
      </div>
      <div class="reg-form">
         <h1>Register</h1>
         <form  method="POST">
            <div class="inputBox">
               <h3>Name</h3>
               <input type="text" name="name" id="name" placeholder="Enter your name">
            </div>
            <div class="inputBox">
               <h3>Email</h3>
               <input type="email" name="email" id="email" placeholder="Enter your email">
            </div>
            <div class="inputBox">
               <h3>Phone</h3>
               <input type="text" name="phone" id="phone" placeholder="Enter your mobile number">
            </div>
            <div class="inputBox">
               <h3>User type</h3>
               <select name="usertype" id="usertype">
                  <option value="Select">Select</option>
                  <option value="Customer">Customer</option>
                  <option value="Plant distributor">Plant distributor</option>
                  <option value="Garden designer">Garden Decoration Item Distributor</option>
                  <option value="Landscape architecture">Landscape Architecture</option>
               </select>
            </div>
            <div class="inputBox">
               <h3>Password</h3>
               <input type="password" name="password" id="password" placeholder="Enter your password">
            </div>
            <input type="button" class="btn" value="Register" onclick="user_register()">
         </form>
      </div>
   </div>
</section>
<?php }else {?>
<!--Checkout Form-->
<section class="checkout-form" id="login-form">
   <div class="row">
      <div class="login">
         <h1>Checkout</h1>
         <form  method="POST">
            <div class="input1">
               <div class="inputBox">
                  <h3>First Name</h3>
                  <input type="text" name="fname" id="fname" placeholder="">
               </div>
               <div class="inputBox">
                  <h3>Last Name</h3>
                  <input type="text" name="lname" id="lname" placeholder="">
               </div>
            </div>
            <div class="inputBox">
               <h3>Company Name</h3>
               <input type="text" name="companyName" id="username" placeholder="">
            </div>
            <div class="inputBox">
               <h3>Country</h3>
               <input type="text" name="country" id="username" placeholder="">
            </div>
            <div class="inputBox">
               <h3>Street Address</h3>
               <input type="text" name="addressOne" id="username" placeholder="">
            </div>
            <div class="inputBox">
               <input type="text" name="addressTwo" id="username" placeholder="">
            </div>
            <div class="inputBox">
               <h3>Town/City</h3>
               <input type="text" name="city" id="username" placeholder="">
            </div>
            <div class="inputBox">
               <h3>State/Country</h3>
               <input type="text" name="sate" id="username" placeholder="">
            </div>
            <div class="input1">
               <div class="inputBox">
                  <h3>Phone</h3>
                  <input type="text" name="phone" id="username" placeholder="">
               </div>
               <div class="inputBox">
                  <h3>Email Address</h3>
                  <input type="text" name="email" id="pass" placeholder="">
               </div>
            </div>
            <div class="inputBox">
               <h3>Payment Type</h3>
               COD
               <div class="radio">
                  <input type="radio" name="paytype" value="COD" id="paytype">
               </div>
               Paypal
               <div class="radio">
                  <input type="radio" name="paytype" value="paypal" id="paytype">
               </div>
            </div>
            <input type="submit" name="submit" class="btn" value="Submit" >
         </form>
      </div>
      <!--Cart Details-->
      <div class="reg-form">
         <div class="container cart" id="invoice">
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
                           <span><?php echo $mrp?></span>
                           <br />
                           <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')">remove</a>
                        </div>
                     </div>
                  </td>
                  <td><input type="text" id="<?php echo $key?>qty" value="<?php echo $qty?>" min="1"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')"></a></td>
                  <td><?php echo $total=$qty*$mrp?></td>
               </tr>
               <?php $subTotal=$subTotal+$total; }} ?>
            </table>
            <div class="total-price">
               <table>
                  <tr>
                     <td>Subtotal</td>
                     <td><?php echo $subTotal ?></td>
                  </tr>
                  <tr>
                     <td>Tax</td>
                     <td>Rs 50</td>
                  </tr>
                  <tr>
                     <td>Total</td>
                     <td><?php echo $subTotal+50?></td>
                  </tr>
               </table>
              
            </div>
         </div>
         <a  href="javascript:void(0)" class="btn-download">Download PDF  </a> 
      </div>
   </div>
</section>
<?php }?>
<?php
   require('footer.php');
   ?>
<!-- Custom Scripts -->
<script src="./js/index.js"></script>
<script src="./js/jspdf.debug.js"></script>
<script src="./js/html2canvas.min.js"></script>
<script src="./js/html2pdf.min.js"></script>

<script>
    const options = {
      margin: 0.5,
      filename: 'invoice.pdf',
      image: { 
        type: 'jpeg', 
        quality: 500
      },
      html2canvas: { 
        scale: 1 
      },
      jsPDF: { 
        unit: 'in', 
        format: 'letter', 
        orientation: 'portrait' 
      }
    }
    
    $('.btn-download').click(function(e){
      e.preventDefault();
      const element = document.getElementById('invoice');
      html2pdf().from(element).set(options).save();
    });
   
    </script>

</body>
</html>