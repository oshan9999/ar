<?php
      require('connection.inc.php');
      
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Image Gallery With Cool Hover Effect</title>
    <!-- Google Fonts Link -->
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700;900&display=swap"
      rel="stylesheet"
    />
    <!-- stylesheet -->
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
  <h1 style="text-align: center;">Garden Designs</h1>
  <div class="hire-btn">
  <button><a href="hire_me.php?id=<?php if(isset($_SESSION['USER_ID'])){echo $_SESSION['USER_ID'];} ?>">Hire Me</a></button>
  </div>
    <div class="image-gallery">
      <?php
       if (isset($_GET['id']) && $_GET['id']!='') {
        $id=$_GET['id'];
        $sql="SELECT * FROM designs WHERE user_id='$id'";
        $res=mysqli_query($con,$sql);
        $i=1;
          while($row=mysqli_fetch_assoc($res)){
      ?>
      <div class="image-box">
        <img src="<?php echo DESIGNS_IMAGE_SITE_PATH.$row['image']?>">
        <div class="overlay">
          <div class="details">
            <h3 class="title">
              <a href=""></a>
            </h3>
            <span class="category">
              <a href="">Garden design</a>
            </span>
          </div>
        </div>
      </div>
      <?php
       $i++;
      }
    }
      ?>
    </div>
  </body>
  
</html>
