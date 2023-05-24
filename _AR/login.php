<?php
   require('header.php');
   ?>
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
                  <option value="Plant distributor">Plant Distributor</option>
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