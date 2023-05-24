<?php

    //Requried essential files
   require('connection.inc.php');
   require('functions.inc.php');
   require('session.php');


   
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
      <?php include_once('top.inc.php'); ?>
      <!--Navigation Bar-->
      <div id="layoutSidenav">
         <div id="layoutSidenav_content">
         <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Customize Orders</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Customize Orders</li>
                        </ol>
                    
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Customize Orders
                            </div>
                            <div class="card-body product-tbl">
                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Product Name</th>
                                            <th>Phone No</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=1;
                                        $sql="SELECT users.id,users.name,users.mobile,customize.product_id,product.id,product.name AS pname,customize.user_id,customize.custom_data FROM customize,users,product WHERE customize.user_id=users.id AND product.id=customize.product_id";
                                        $res=mysqli_query($con,$sql);
                                        while ($row=mysqli_fetch_assoc($res)) {?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['pname'];?></td>
                                            <td><?php echo $row['mobile'];?></td>
                                            <td><?php echo $row['custom_data'];?></td>
                                        </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
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
      <!--Side Bar-->
      <?php require('sidebar.inc.php');?>
      <!--Side Bar-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script src="js/scripts.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      <script src="assets/demo/chart-area-demo.js"></script>
      <script src="assets/demo/chart-bar-demo.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
      <script src="js/datatables-simple-demo.js"></script>
   </body>
</html>