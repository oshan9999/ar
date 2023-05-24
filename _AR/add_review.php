<?php
    require('connection.inc.php');

    if(isset($_POST["ratedIndex"])){
        $pid=$_POST['id'];
        $review=$_POST['review'];
        $rate=$_POST["ratedIndex"];

        $sql="INSERT INTO reviews(pid,review,rate)VALUES('$pid','$review','$rate')";

        mysqli_query($con,$sql);

        echo "You added the review";

    }


    if(isset($_POST['action'])){
        $pid=$_POST['id'];
        $average_rating=0;
        $total_review=0;
        $five_star_review=0;
        $four_star_review=0;
        $three_star_review=0;
        $two_star_review=0;
        $one_star_review=0;
        $total_user_rating=0;
        $review_content=array();

        $sql="SELECT * FROM reviews WHERE pid='$pid' ORDER BY id DESC";

        $res=mysqli_query($con,$sql);

        

        foreach($res as $row){
            $review_content[]=array(
                'review'=>$row['review'],
                'rate'=>$row['rate']
            );
            if($row['rate']==5){
                $five_star_review++;
            }
            if ($row['rate']==4) {
                $four_star_review++;
            }
            if ($row['rate']==3) {
                $three_star_review++;
            }
            if($row['rate']==2){
                $two_star_review++;
            }
            if ($row['rate']==1) {
                $one_star_review++;
            }

            $total_review++;

            $total_user_rating=$total_user_rating+$row['rate'];
        }

            $average_rating=$total_user_rating/$total_review;

            $out_put=array(
                'average_rating'=>number_format($average_rating,1),
                'total_review'=>$total_review,
                'five_star_review'=>$five_star_review,
                'four_star_review'=>$four_star_review,
                'three_star_review'=>$three_star_review,
                'two_star_review'=>$two_star_review,
                'one_star_review'=>$one_star_review,
                'review_data'=>$review_content
            );

            echo json_encode($out_put);
    }
?>