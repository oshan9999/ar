<?php
   require('connection.inc.php');
   require('functions.inc.php');
   $msg='';
   if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!='') {
       $USER_ID=$_SESSION['USER_ID'];
   }else{
       header('location:index.php');
       die();
   }

   $sql="SELECT * FROM users WHERE id='$USER_ID'";
   $res=mysqli_query($con,$sql);

   $image='';

   if(isset($_POST['save'])){
      $uname=$_POST['username'];
      $email=$_POST['email'];
      $phone=$_POST['mobile'];
      $location=$_POST['location'];
      $about=$_POST['about'];

      if ($_FILES['image']['name']!='') {
         $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
         move_uploaded_file($_FILES['image']['tmp_name'],'../media/users/'.$image);
         $update_sql="UPDATE users SET name='$uname',email='$email',location='$location',
         about='$about',image='$image' WHERE id='$USER_ID'";
     }else{
      $update_sql="UPDATE users SET name='$uname',email='$email',location='$location',
         about='$about' WHERE id='$USER_ID'";
     }
      if (mysqli_query($con,$update_sql)) {
         echo "<script>
               alert('Successfully updates');
         </script>";
         echo '<script language="javascript">window.location.href="profile.php"</script>'; 
      }
   }

   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Dashboard Admin</title>
      <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
      <link href="css/styles.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
   </head>
   <body class="sb-nav-fixed">
      <!--Navigation Bar-->
      <?php require('top.inc.php');?>
      <!--Navigation Bar-->
      <div id="layoutSidenav">
         <div id="layoutSidenav_content">
            <main>
               <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

               <div class="container-fluid px-4">
                   <?php
                        $row=mysqli_fetch_assoc($res);
                   ?>
                  <div class="row flex-lg-nowrap">
                     <div class="col">
                        <div class="row">
                           <div class="col mb-3">
                              <div class="card">
                                 <div class="card-body">
                                    <div class="e-profile">
                                       <div class="row">
                                          <div class="col-12 col-sm-auto mb-3">
                                            
                                             <div class="mx-auto" style="width: 140px;">
                                                <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                   <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;"></span>
                                                   <img src="<?php echo USER_IMAGE_SITE_PATH.$row['image']?>" style="height: 140px; width:140px; object-fit: cover;" alt="">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                             <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $row['name'];?></h4>
                                                <p class="mb-0"><?php echo $row['type'];?></p>
                                                <div class="text-muted"><small>Last seen 2 hours ago</small></div>
                                             </div>
                                             <div class="text-center text-sm-right">
                                                <span class="badge badge-secondary">administrator</span>
                                                <div class="text-muted"><small>Joined <?php echo $row['added_on'];?></small></div>
                                             </div>
                                          </div>
                                       </div>
                                       <ul class="nav nav-tabs">
                                          <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                       </ul>
                                       <div class="tab-content pt-3">
                                          <div class="tab-pane active">
                                             <form method="POST" enctype="multipart/form-data">
                                                <div class="row">
                                                   <div class="col">
                                                      <div class="row">
                                                         <div class="col-6">
                                                            <div class="form-group">
                                                               <label>Username</label>
                                                               <input class="form-control" type="text" name="username" placeholder="johnny.s" value="<?php echo $row['name'];?>">
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row mt-3">
                                                         <div class="col-6">
                                                            <div class="form-group">
                                                               <label>Email</label>
                                                               <input class="form-control" name="email" type="text" placeholder="user@example.com" value="<?php echo $row['email'];?>">
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row mt-3">
                                                         <div class="col-6">
                                                            <div class="form-group">
                                                            <label>Email</label>
                                                            <input class="form-control" name="image" type="file">
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row mt-3">
                                                         <div class="col-6">
                                                            <div class="form-group">
                                                               <label>Phone Number</label>
                                                               <input class="form-control" type="text" name="mobile" placeholder="" value="<?php echo $row['mobile'];?>">
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row mt-3">
                                                         <div class="col-6">
                                                            <div class="form-group">
                                                               <label>Location</label>
                                                               <input class="form-control" type="text" name="location" placeholder="" value="<?php echo $row['location'];?>">
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="row mt-3">
                                                         <div class="col-6 mb-3">
                                                            <div class="form-group">
                                                               <label>About</label>
                                                               <textarea class="form-control" rows="5" name="about" placeholder="My Bio" ><?php echo $row['location'];?></textarea>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                </div>
                                                <div class="row">
                                                   <div class="col d-flex justify-content-end">
                                                      <button class="btn btn-primary" type="submit" name="save">Save Changes</button>
                                                   </div>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
               <div class="container-fluid px-4">
                  <div class="d-flex align-items-center justify-content-between small">
                     <div class="text-muted"></div>
                     <div>
                        <a href="#"></a>
                        &middot;
                        <a href="#"></a>
                     </div>
                  </div>
               </div>
            </footer>
         </div>
      </div>
      <!--Navigation Bar-->
      <?php require('sidebar.inc.php');?>
      <!--Navigation Bar-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script src="js/scripts.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      <script src="assets/demo/chart-area-demo.js"></script>
      <script src="assets/demo/chart-bar-demo.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
      <script src="js/datatables-simple-demo.js"></script>
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