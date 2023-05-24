<?php
   require('header.php');
    if(isset($_SESSION['USER_ID'])){
        $pid=$_GET['id'];
        $userid=$_SESSION['USER_ID'];
        if(isset($_POST['submit'])){
            $customData=$_POST['customize'];

            $sql="INSERT INTO customize(product_id,user_id,custom_data) VALUES('$pid','$userid','$customData')";
            $res=mysqli_query($con,$sql);
            if($res){
                echo"<script>
                    alert('Customize request submitted!');
                    window.location.href='index.php';
                </script>";
            }
        }
        
    }else{
        echo "<script>alert('Please login!')
        window.location.href='login.php';</script>";
        
    }


   ?>
<section class="customize-product" id="customize-product">
   <div class="row">
      <div class="login">
         <h1>Customize Your product</h1>
         <form method="POST">
            <div class="inputBox">
               <h3>Your Customization details</h3>
               <textarea name="customize" id="" cols="60" rows="10"></textarea>
            </div>
            <input type="submit" class="btn" name="submit" value="Submit">
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