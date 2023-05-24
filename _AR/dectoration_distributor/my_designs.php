<?php
    require('connection.inc.php');
    require('functions.inc.php');
    require('session.php');
    
    //Active & Deactive 
    $user_id=$_SESSION['USER_ID']; 

    $sql="SELECT * FROM designs WHERE user_id='$user_id'";
    $res=mysqli_query($con,$sql);


    if (isset($_GET['type']) && $_GET['type']!='') {
        $type=get_safe_value($con,$_GET['type']);
        //Delete
        if ($type=='delete') {
            $id=$_GET['id'];
            $delete_sql="DELETE FROM designs WHERE id='$id'";
            $sql=mysqli_query($con,$delete_sql);
            if ($sql) {
              echo "<script>
                 alert('Deleted!');
              </script>";
              echo '<script language="javascript">window.location.href="my_designs.php"</script>'; 
             // header('location:index.php');
        
          }
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
                        <h1 class="mt-4">Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Product List
                            </div>
                            <div class="card-body product-tbl">
                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                        
                                            <th>Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=1;
                                        while ($row=mysqli_fetch_assoc($res)) {?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row['id'];?></td>
                                            <td><img data-action="zoom" data-original="<?php echo DESIGNS_IMAGE_SITE_PATH.$row['image']?>" src="<?php echo DESIGNS_IMAGE_SITE_PATH.$row['image']?>"/></td>
                                        
                                            <td>
                                                <div class="option-btn">
                                                <?php 
    
                                                    echo "<span class='btn  delete-btn'><a href='?type=delete&id=".$row['id']."'>Delete</a></span> &nbsp;";
                                                    
                                                 ?>
                                                </div>
                                            </td>
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
        <script src="https://kit.fontawesome.com/eb7c0136d4.js" crossorigin="anonymous"></script>
        <script src="js/zooming.min.js"></script>
        <script>
            new Zooming().listen('img')
        </script>
    </body>
</html>
