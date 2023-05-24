<?php
$subTotal=0;
   require('header.php');
  
?>   
<?php if(!isset($_SESSION['USER_LOGIN'])){?>
   <section class="login-form" id="login-form">
   <div class="row">
      <div class="login">
         <img src="images/package_one.png" alt="" srcset="">
      </div>
      <div class="reg-form">
         <h1>Back Yard</h1>
         <div style="margin-top: 4rem;">
         <h2>Custom Landscape design</h2>
         <p>Custom planting and hardscaping design for your back yard selected by a team of landscape architects, designers and horticulturists.</p>
         <p>Your design package deliverable comes with a plant palette, 3D renderings, and CAD plans for better communication with your contractor.
        Once you're ready to install, we're happy to help connect you with our great network of contractors (select areas available).
        We've built a database of plants, trees and ground covers to account for your planting zone and specific wants, but we always have a horticulturalist make the final calls when choosing your design's plant palette.
         After you show us your style and tell us how and who uses your outdoor space, we're well-equipped to choose your plants.</p>
         </div>
         <div class="" style="margin-top: 3rem;">
         <h2>Dedicated design team</h2>
             <p>Yardzen designers are industry stars, with bachelor's and master's degrees in landscape design and landscape architecture. We've created a unique platform for leading professionals to work on projects like yours in an incredibly flexible way and build their portfolios. Think of Yardzen as a unique opportunity to have an exceptional talent work on your outdoor space in a way that's also incredibly efficient for you.</p>
         </div>
         <div class="" style="margin-top: 3rem;">
         <h2>Design Revision</h2>
             <p>Once you receive your first set of 3D renderings and plant list, we’ll take you to our Feedback Studio. Here you’ll be able to communicate with your designer, sending through any feedback and questions you might have. Next, we’ll move into the second round of designs, which comes with revised renderings and 2D CAD plans for your contractor. Once you move from the design to build phase, we expect there to be changes made in the field with your contractor as well!</p>
         </div>
         <div style="margin-top: 3rem;">
         <h2>Match with vetted contractor</h2>
             <p>In many ways our deep contractor relationships are our secret sauce. We partner only with the best, most responsive and diligent contractors for our clients' projects. Contractors in the Yardzen Pro Network love to work on Yardzen projects because every project starts with a design. They appreciate that we've already invested the work to help you arrive at a plan. So, when they enter the picture, they can get to work. Win-win.</p>
         </div>
         <div style="margin-top: 3rem;">
         <h2>Shoppable furniture & materials</h2>
             <p>Every Yardzen design includes shoppable furniture and materials from your favorite outdoor living brands, including TimberTech, Crate & Barrel, CB2, Rejuvenation, Yardbird, Benjamin Moore, Marvin Windows, and more.</p>
         </div>
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