<?php
     require('connection.inc.php');
     require('functions.inc.php');
     
     $username=get_safe_value($con,$_POST['username']);
     $password=md5(get_safe_value($con,$_POST['pass']));

     $res=mysqli_query($con,"SELECT * FROM users WHERE email='$username' AND password='$password'");
     $check_user=mysqli_num_rows($res);

     $result=array();

     if ($check_user>0) {
         $row=mysqli_fetch_assoc($res);
         $_SESSION['USER_LOGIN']='yes';
         $_SESSION['USER_ID']=$row['id'];
         $_SESSION['USER_NAME']=$row['name'];
         $result['userType']=$row['type'];
         //echo "ok";
         echo json_encode($result);
     }else{
         echo json_encode('wrong');
     }
?>  