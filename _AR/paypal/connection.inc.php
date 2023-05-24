<?php
session_start();
$con=mysqli_connect("localhost","root","","ar");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/AR/');
define('SITE_PATH','http://localhost/AR/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('DESIGNS_IMAGE_SERVER_PATH',SERVER_PATH.'media/designs/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
define('DESIGNS_IMAGE_SITE_PATH',SITE_PATH.'media/designs/');
define('USER_IMAGE_SERVER_PATH',SERVER_PATH.'/media/users/');
define('USER_IMAGE_SITE_PATH',SITE_PATH.'/media/users/');
?>