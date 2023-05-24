<?php
if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!='') {
     
}else{
    header('location:index.php');
    die();
}
?>