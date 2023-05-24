<?php
     require('connection.inc.php');
     require('functions.inc.php');
     
     $name=get_safe_value($con,$_POST['name']);
     $email=get_safe_value($con,$_POST['email']);
     $phone=get_safe_value($con,$_POST['phone']);
     $usertype=get_safe_value($con,$_POST['usertype']);
     $password=md5(get_safe_value($con,$_POST['password']));

     $check_user=mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE email='$email'"));
     if ($check_user>0) {
         echo "Email registerd";
     }else{
         $added_on=date('Y-m-d h:i:s');
         $status="Active now";
         $query=mysqli_query($con,"INSERT INTO users(name,email,mobile,added_on,type,password,status) VALUES('$name','$email','$phone','$added_on','$usertype','$password','$status')");
         

         if(!$query){
            echo "Fialed".mysqli_error($con);
         }else{
            $query2=mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
            if (mysqli_num_rows($query2)>0) {
                $row=mysqli_fetch_assoc($query2);
                $_SESSION['user_id']=$row['id'];
            }
            echo "Inserted";
         }

         
     }
?>  