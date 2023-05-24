<?php
require('connection.inc.php');
require('functions.inc.php');
header('Cache-Control: no cache');
  ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
<section class="profiles">
<?php
        if (isset($_POST['query'])) {
        $input=$_POST['query'];
        $sql="SELECT * FROM users WHERE location LIKE '%$input%'";
        $res=mysqli_query($con,$sql);
        
        if ($res->num_rows>0) {
           while ($row=$res->fetch_assoc()) {
    
      ?>
  <div class="content">
      <div class="profile-img">
        <img src="<?php echo USER_IMAGE_SITE_PATH.$row['image']?>"alt="">
      </div>
      <div class="heading">
        <h2><?php echo $row['name']?></h2>
        <h4><?php echo $row['type']?></h4>
        <h4><?php echo $row['mobile']?></h4>
      <div class="text">
        <p><?php echo $row['about']?></p>
          <div class="btn">
            <a href="designs.php?id=<?php echo $row['id']?>">View</a>
          </div>
      </div>
      </div>
  </div>  
<hr>
  <?php
  }
} 
}
  ?>
</section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>

  
</html>