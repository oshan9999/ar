<?php
    require('connection.inc.php');
    require('functions.inc.php');
    require('session.php');
    
    //Active & Deactive 
    if (isset($_GET['type']) && $_GET['type']!='') {
        $type=get_safe_value($con,$_GET['type']);
        if ($type=='status') {
            $operation=get_safe_value($con,$_GET['operation']);
            $id=get_safe_value($con,$_GET['id']);
            if ($operation=='active') {
                $status='1';
            }else{
                $status='0';
            }
            $update_status="UPDATE categories SET status='$status' WHERE id='$id'";
            mysqli_query($con,$update_status);
        }


        //Delete
        if ($type=='delete') {
            $id=get_safe_value($con,$_GET['id']);
            $delete_sql="DELETE FROM categories WHERE id='$id'";
            mysqli_query($con,$delete_sql);
        }
    }


    $sql="SELECT product.*,categories.categories FROM product,categories WHERE product.categories_id=categories.id ORDER BY product.id DESC";
    $res=mysqli_query($con,$sql);
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
                                            <th>Categories</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>MRP</th>
                                            <th>Price</th>
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
                                            <td><?php echo $row['categories'];?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
                                            <td><?php echo $row['mrp'];?></td>
                                            <td><?php echo $row['price'];?></td>
                                            <td><?php echo $row['qty'];?></td> 
                                            <td>
                                                <div class="option-btn">
                                                <?php 
                                                    if ($row['status']==1) {
                                                        echo "<span class='btn btn-success active-btn'><a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                                                    }else{
                                                        echo "<span class='btn btn-danger deactive-btn'><a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                                                    }
                                                    echo "<span class='btn  delete-btn'><a href='?type=delete&id=".$row['id']."'>Delete</a></span> &nbsp;";
                                                    echo "<span class='btn btn-info edit-btn'><a href='add_products.php?id=".$row['id']."'>Edit</a></span>";
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
        
    </body>
</html>
