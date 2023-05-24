<?php
if (isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!='') {
     
}else{
    header('location:index.php');
    die();
}
?>