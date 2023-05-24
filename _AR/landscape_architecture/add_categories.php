<?php
    require('connection.inc.php');
    require('functions.inc.php');
    require('session.php');
    
    $categories='';
    $msg='';
    //Edit function
    if (isset($_GET['id']) && $_GET['id']!='') {
        $id=get_safe_value($con,$_GET['id']);
        $res=mysqli_query($con,"SELECT * FROM categories WHERE id='$id'");
        $check=mysqli_num_rows($res);
        if ($check>0) {
            $row=mysqli_fetch_assoc($res);
            $categories=$row['categories'];
        }else{
            header('location:categories.php');
            die();
        }
    }

    //Submit function
    if (isset($_POST['submit'])) {
        $categories=get_safe_value($con,$_POST['categories']);
        $res=mysqli_query($con,"SELECT * FROM categories WHERE categories='$categories'");
        $check=mysqli_num_rows($res);

         //Check Category already exist
        if ($check>0) {
            if (isset($_GET['id']) && $_GET['id']!='') {
                  $getData=mysqli_fetch_assoc($res);
                  if ($id==$getData['id']) {
                     
                  }else{
                     $msg="Category already exist";
                  }
               }else{
                  $msg="Category already exist";
               }
        }
        if ($msg=='') {
         if (isset($_GET['id']) && $_GET['id']!='') {
            mysqli_query($con,"UPDATE categories SET categories='$categories' WHERE id='$id'");
        }else{
            mysqli_query($con,"INSERT INTO categories(categories,status) VALUES ('$categories','1')");
        }
        
        header('location:categories.php');
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
                  <h1 class="mt-4">Add Categories</h1>
                  <ol class="breadcrumb mb-4">
                     <li class="breadcrumb-item active">Add Categories</li>
                  </ol>
                  <div class="card mb-4">
                     <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Add Category
                     </div>
                     <div class="card-body">
                        <form method="POST">
                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Category</label>
                              <input type="text" name="categories" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category" required value="<?php echo $categories; ?>">
                           </div>
                           <div class="cat-btn">
                                <button type="submit" name="submit" class="btn btn-success">Add</button>
                           </div>
                        </form>
                        <div class="cat-error"><?php echo $msg;?></div>
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