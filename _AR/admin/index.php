<?php
   require('connection.inc.php');
   require('functions.inc.php');
   $msg='';
   if (isset($_POST['submit'])) {
      $username=get_safe_value($con,$_POST['username']);
      $password=get_safe_value($con,$_POST['password']);
      $sql="SELECT * FROM admin_users WHERE username='$username' AND password='$password'";
      $res=mysqli_query($con,$sql);
      $count=mysqli_num_rows($res);
      if ($count>0) {
         $_SESSION['ADMIN_LOGIN']='yes';
         $_SESSION['ADMIN_USERNAME']=$username;
         header('location:dashboard.php');
         die();
      }else{
         $msg="Please enter correct login details";
      }
   }
?>

<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <!--CSS Link-->
      <link rel="stylesheet" href="assets/style.css">
      <title>Admin login</title>
   </head>
   <body>
      <section class="vh-100  admin-login">
         <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center h-100">
               <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                  <div class="card-body p-5">
                     <h3 class="mb-5 ">Admin Login</h3>
                        <div class="field-error">
                           <?php echo $msg?>
                        </div>
                     <form method="POST">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Username</label>
                           <input type="email" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">Password</label>
                           <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-block">Login</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script type="text/javascript">
            function preventBack(){
                window.history.forward();
                };
                setTimeout("preventBack()",0);
                window.unload=function(){
                    null;
                    }
        </script>
   </body>
</html>