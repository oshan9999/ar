<?php
      require('connection.inc.php');

      if(isset($_SESSION['USER_ID'])){
            if (isset($_POST['submit'])) {
                $userid=$_SESSION['USER_ID'];
            $name=$_POST['name'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $message=$_POST['message'];

            $sql="INSERT INTO design_orders(user_id,name,email,phone_no,message)VALUES('$userid','$name','$email','$phone','$message')";

            $res=mysqli_query($con,$sql);

            if($res){
                echo "<script>
                    alert('Order submitted');
                    window.location = 'index.php';
                </script>";
            }else{
                echo mysqli_error($con);
            }
            }

      }else{
        echo "<script>
        alert('Please login!');
        window.location = 'index.php';
    </script>";
    echo mysqli_error($con);
      }
      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire Me</title>
    <style type="text/css">
.form-style-1 {
	margin:10px auto;
	max-width: 400px;
	padding: 20px 12px 10px 20px;
	font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.form-style-1 li {
	padding: 0;
	display: block;
	list-style: none;
	margin: 10px 0 0 0;
}
.form-style-1 label{
	margin:0 0 3px 0;
	padding:0px;
	display:block;
	font-weight: bold;
}
.form-style-1 input[type=text], 
.form-style-1 input[type=date],
.form-style-1 input[type=datetime],
.form-style-1 input[type=number],
.form-style-1 input[type=search],
.form-style-1 input[type=time],
.form-style-1 input[type=url],
.form-style-1 input[type=email],
textarea, 
select{
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	border:1px solid #BEBEBE;
	padding: 7px;
	margin:0px;	
}
.form-style-1 input[type=text]:focus, 
.form-style-1 input[type=date]:focus,
.form-style-1 input[type=datetime]:focus,
.form-style-1 input[type=number]:focus,
.form-style-1 input[type=search]:focus,
.form-style-1 input[type=time]:focus,
.form-style-1 input[type=url]:focus,
.form-style-1 input[type=email]:focus,
.form-style-1 textarea:focus, 
.form-style-1 select:focus{
	-moz-box-shadow: 0 0 8px #88D5E9;
	-webkit-box-shadow: 0 0 8px #88D5E9;
	box-shadow: 0 0 8px #88D5E9;
	border: 1px solid #88D5E9;
}
.form-style-1 .field-divided{
	width: 100%;
}

.form-style-1 .field-long{
	width: 100%;
}
.form-style-1 .field-select{
	width: 100%;
}
.form-style-1 .field-textarea{
	height: 100px;
}
.form-style-1 input[type=submit], .form-style-1 input[type=button]{
	background: #69ae14;
	padding: 8px 15px 8px 15px;
	border: none;
	color: #fff;
}
.form-style-1 input[type=submit]:hover, .form-style-1 input[type=button]:hover{
    cursor: pointer;
	background: #4691A4;
	box-shadow:none;
	-moz-box-shadow:none;
	-webkit-box-shadow:none;
}
.form-style-1 .required{
	color:red;
}
</style>
</head>
<body>
<form method="POST">
<ul class="form-style-1">
    <li><label>Full Name <span class="required">*</span></label>
        <input type="text" name="name" class="field-divided"> 
        
    <li>
        <label>Email <span class="required">*</span></label>
        <input type="email" name="email" class="field-long" />
    </li>
    <li>
        <label>Phone<span class="required">*</span></label>
        <input type="text" name="phone" class="field-long" />
    </li>
    <li>
        <label>Your Message <span class="required">*</span></label>
        <textarea name="message" id="field5" class="field-long field-textarea"></textarea>
    </li>
    <li>
        <input type="submit" name="submit" value="Submit">
    </li>
</ul>
</form>
</body>
</html>