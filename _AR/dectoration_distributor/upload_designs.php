<?php
   
    //Requried essential files
   require('connection.inc.php');
   require('functions.inc.php');
   require('session.php');
   //Variables declare
   $msg='';
   $user_id=$_SESSION['USER_ID']; 
   
  


      
   
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
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
      <link href="css/styles.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
   </head>
   <body class="sb-nav-fixed">
      <!--Navigation Bar-->
      <?php include_once('top.inc.php'); ?>
      <!--Navigation Bar-->
      <div id="layoutSidenav">
         <div id="layoutSidenav_content">
            <main>
               <div class="container-fluid px-4">
                  <h1 class="mt-4">Upload Designs</h1>
                  <ol class="breadcrumb mb-4">
                     <li class="breadcrumb-item active">Upload Designs</li>
                  </ol>
                  <div class="card mb-4">
                     <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Upload Designs
                     </div>
                     <div class="card-body product-form">
                        <div class="cat-error"><?php echo $msg;?></div>
                        <form method="POST" enctype="multipart/form-data">
                           
                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Image</label>
                              <input type="file" name="image" class="form-control"  placeholder="Enter Category" required>
                           </div>
                           <div class="cat-btn">
                              <button type="submit" name="submit" class="btn btn-success">Add</button>
                           </div>

                        </form>
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

      <div class="modal fade" id="thankyouModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Thank you for pre-registering!</h4>
            </div>
            <div class="modal-body">
                <p>Thanks for getting in touch!</p>                     
            </div>    
        </div>
    </div>
</div>
      <!--Side Bar-->
      <?php require('sidebar.inc.php');?>
      <!--Side Bar-->
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.9/dist/sweetalert2.all.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script src="js/scripts.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      <script src="assets/demo/chart-area-demo.js"></script>
      <script src="assets/demo/chart-bar-demo.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
      <script src="js/datatables-simple-demo.js"></script>
      <script src="https://kit.fontawesome.com/eb7c0136d4.js" crossorigin="anonymous"></script>
      <script type="text/javascript">
      
      </script>
   <?php
    //Submit function
    if (isset($_POST['submit'])) {
      $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'../media/designs/'.$image);
         $sql=mysqli_query($con,"INSERT INTO designs(user_id,image) VALUES('$user_id','$image')");
      if ($sql) {
          echo "<script>
          Swal.fire(
             'Design added!',
             'You clicked the button!',
             'success'
           );
          </script>";
          //echo '<script language="javascript">window.location.href="upload_designs.php"</script>'; 
         header('location:upload_designs.php');
    
      }
 }
   ?>

   </body>
</html>