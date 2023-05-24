<?php

    //Requried essential files
   require('connection.inc.php');
   require('functions.inc.php');
   require('session.php');

   //Variables declare
   $categories_id='';
   $name='';
   $mrp='';
   $price='';
   $qty='';
   $image='';
   $short_desc='';
   $description='';
   $meta_title='';
   $meta_desc='';
   $meta_description='';
   $meta_keyword='';
   $msg='';

   //Edit function
   if (isset($_GET['id']) && $_GET['id']!='') {
       $id=get_safe_value($con,$_GET['id']);
       $res=mysqli_query($con,"SELECT * FROM product WHERE id='$id'");
       $check=mysqli_num_rows($res);
       if ($check>0) {
           $row=mysqli_fetch_assoc($res);
           $categories_id=$row['categories_id'];
           $name=$row['name'];
           $mrp=$row['mrp'];
           $price=$row['price'];
           $qty=$row['qty'];
           $short_desc=$row['short_desc'];
           $description=$row['description'];
           $meta_title=$row['meta_title'];
           $meta_desc=$row['meta_desc'];
           $meta_keyword=$row['meta_keyword'];
      
       }else{
           header('location:products.php');
           die();
       }
   }
   
   //Submit function
   if (isset($_POST['submit'])) {
       $categories_id=get_safe_value($con,$_POST['categories_id']);
       $name=get_safe_value($con,$_POST['name']);
       $mrp=get_safe_value($con,$_POST['mrp']);
       $price=get_safe_value($con,$_POST['price']);
       $qty=get_safe_value($con,$_POST['qty']);
       $short_desc=get_safe_value($con,$_POST['short_desc']);
       $description=get_safe_value($con,$_POST['description']);
       $meta_title=get_safe_value($con,$_POST['meta_title']);
       $meta_desc=get_safe_value($con,$_POST['meta_desc']);
       $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
       $image=get_safe_value($con,$_POST['image']);

       $res=mysqli_query($con,"SELECT * FROM product WHERE name='$name'");
       $check=mysqli_num_rows($res);
   
        //Check Category already exist
       if ($check>0) {
           if (isset($_GET['id']) && $_GET['id']!='') {
                 $getData=mysqli_fetch_assoc($res);
                 if ($id==$getData['id']) {
                    
                 }else{
                    $msg="Product already exist";
                 }
              }else{
                 $msg="Product already exist";
              }
       }
       if ($msg=='') {
        if (isset($_GET['id']) && $_GET['id']!='') {
           if ($_FILES['image']['name']!='') {
               $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
               move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
               $update_sql="UPDATE product SET categories_id='$categories_id',name='$name',mrp='$mrp',
               price='$price',qty='$qty',image='$image',short_desc='$short_desc',description='$description',meta_title='$meta_title',
               meta_desc='$meta_desc',meta_keyword='$meta_keyword' WHERE id='$id'";
           }else{
            move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
            $update_sql="UPDATE product SET categories_id='$categories_id',name='$name',mrp='$mrp',
            price='$price',qty='$qty',image='$image',short_desc='$short_desc',description='$description',meta_title='$meta_title',
            meta_desc='$meta_desc',meta_keyword='$meta_keyword' WHERE id='$id'";
           }
           mysqli_query($con,$update_sql);
       }else{
          $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
          move_uploaded_file($_FILES['image']['tmp_name'],'../media/product/'.$image);
           mysqli_query($con,"INSERT INTO product(categories_id,name,mrp,price,qty,image,short_desc,description,meta_title,meta_desc,meta_keyword,status) VALUES 
           ('$categories_id','$name','$mrp','$price','$qty','$image','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword','1')");
       }
       
       header('location:products.php');
       die();
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
      <?php include_once('top.inc.php'); ?>
      <!--Navigation Bar-->
      <div id="layoutSidenav">
         <div id="layoutSidenav_content">
            <main>
               <div class="container-fluid px-4">
                  <h1 class="mt-4">Add Products</h1>
                  <ol class="breadcrumb mb-4">
                     <li class="breadcrumb-item active">Add Products</li>
                  </ol>
                  <div class="card mb-4">
                     <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Add Products
                     </div>
                     <div class="card-body product-form">
                        <div class="cat-error"><?php echo $msg;?></div>
                        <form method="POST" enctype="multipart/form-data">
                           <div class="form-group w-50">
                              <label for="exampleFormControlSelect1">Category</label>
                              <select class="form-select" aria-label="Default select example" name="categories_id">
                                 <option selected>Open this select menu</option>
                                 <?php
                                    $res=mysqli_query($con,"SELECT id,categories FROM categories ORDER BY categories ASC");
                                    while ($row=mysqli_fetch_assoc($res)) {
                                       //Set edit value
                                       if ($row['id']==$categories_id) {
                                          echo "<option selected value=".$row['id'].">".$row['categories']."</option>";   
                                       }else{
                                          echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                       }
                                    }  
                                    ?>
                              </select>
                           </div>
                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Product Name</label>
                              <input type="text" name="name" class="form-control"  placeholder="Enter Product Name" required value="<?php echo $name;?>">
                           </div>

                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">MRP</label>
                              <input type="text" name="mrp" class="form-control"  placeholder="Enter MRP" required value="<?php echo $mrp;?>">
                           </div>

                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Price</label>
                              <input type="text" name="price" class="form-control"   placeholder="Enter Price" required value="<?php echo $price;?>">
                           </div>

                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Qty</label>
                              <input type="text" name="qty" class="form-control"  placeholder="Enter Qty" required value="<?php echo $qty;?>">
                           </div>

                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Image</label>
                              <input type="file" name="image" class="form-control"   required>
                             
                           </div>

                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Short Description</label>
                              <textarea type="text" name="short_desc" class="form-control"  placeholder="Enter Short Description" required value="<?php echo $short_desc;?>"></textarea>
                           </div>

                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Description</label>
                              <textarea type="text" name="description" class="form-control"  placeholder="Enter Description" required value="<?php echo $description;?>"></textarea>
                           </div>
                           
                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Material</label>
                              <textarea type="text" name="meta_title" class="form-control"  placeholder="Enter Material" required value="<?php echo $short_desc;?>"></textarea>
                           </div>

                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Size</label>
                              <textarea type="text" name="meta_desc" class="form-control"  placeholder="Enter Size" required value="<?php echo $short_desc;?>"></textarea>
                           </div>

                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Meta Keyword</label>
                              <textarea type="text" name="meta_keyword" class="form-control"  placeholder="Enter Category" required value="<?php echo $short_desc;?>"></textarea>
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