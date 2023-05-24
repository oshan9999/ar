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
                $status='Accepted';
                $update_status="UPDATE `order` SET order_status='$status' WHERE id='$id'";
                if(mysqli_query($con,$update_status)){
                    echo"<script>
                        alert('Order Accepted success');
                    </script>";
                }
            }else{
                $status='Pending';
                $update_status="UPDATE `order` SET order_status='$status' WHERE id='$id'";
                if(mysqli_query($con,$update_status)){
                    echo"<script>
                        alert('Order Set to Pending');
                    </script>";
                }
            }
            
        }


        //Delete
        if ($type=='delete') {
            $id=get_safe_value($con,$_GET['id']);
            $delete_sql="DELETE FROM `order` WHERE id='$id'";
            if(mysqli_query($con,$delete_sql)){
                echo"<script>
                    alert('Deleted success');
                </script>";
            }
        }
    }


    $sql="SELECT * FROM `order`";
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
                        <h1 class="mt-4">Orders</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                    
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Orders
                            </div>
                            <div class="card-body product-tbl">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Payment Type</th>
                                            <th>Phone</th>
                                            <th>Payment Status</th>
                                            <th>Total</th>
                                            <th>Order Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=1;
                                        while($row=mysqli_fetch_assoc($res)) {
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                           
                                            <td><?php echo $row['first_name'].' '.$row['last_name'];?></td>
                                            <td><?php echo $row['address_one'].','.$row['address_two'];?></td>
                                            <td><?php echo $row['city']?></td>
                                            <td><?php echo $row['payment_type'];?></td>
                                            <td><?php echo $row['phone'];?></td>
                                            <td><?php echo $row['payment_status'];?></td> 
                                            <td><?php echo'Rs'.$row['total_price'];?></td> 
                                            <td><?php echo $row['order_status'];?></td> 
                                            <td><?php echo $row['added_on'];?></td> 
                                            <td>
                                                <div class="option-btn">
                                                <?php 
                                                    if ($row['order_status']=='Pending') {
                                                        echo "<span class='btn btn-success active-btn'><a href='?type=status&operation=active&id=".$row['id']."'>Active</a></span>";
                                                    }else{
                                                        echo "<span class='btn btn-danger deactive-btn'><a href='?type=status&operation=deactive&id=".$row['id']."'>Deactive</a></span>";
                                                    }
                                                    echo "<span class='btn  delete-btn'><a href='?type=delete&id=".$row['id']."'>Delete</a></span> ";
                                                   
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
