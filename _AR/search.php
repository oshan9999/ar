<?php
require('connection.inc.php');
require('functions.inc.php');

    if (isset($_POST['query'])) {
        $input=$_POST['query'];
        $sql="SELECT * FROM users WHERE location LIKE '%$input%' LIMIT 1";
        $res=mysqli_query($con,$sql);
        
        $html='<ul>';
        
        if ($res->num_rows>0) {
            while ($row=$res->fetch_assoc()) {
                $html.="<li><a>".$row['location']."</a></li>";
            }
        }else{
            $html.="<li>Sorry No record found</li>";
        }

        $html.="</ul>";
        echo $html;
    }

?>