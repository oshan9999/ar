<?php

function pr($arr){
    echo'<pre>';
    print_r($arr);
}

function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();
}

function get_safe_value($con,$str){
    if ($str!='') {
        $str=trim($str);
        return mysqli_real_escape_string($con,$str);
    }
}

function get_product($con,$type='',$limit='',$product_id='',$cat_id=''){
    $sql="SELECT * FROM product";

    if ($product_id!='') {
        $sql.=" WHERE id=$product_id";
    }

    if ($cat_id!='') {
        $sql.=" WHERE categories_id=$cat_id";
    }

    if($type=='latest') {
        $sql.=" ORDER BY id DESC";
    }
    if($limit!='') {
        $sql.=" limit $limit";
    }
    $res=mysqli_query($con,$sql);
    $data=array();
    while($row=mysqli_fetch_assoc($res)) {
        $data[]=$row;
    }
    return $data;
}


function get_promote_product($con,$type='',$limit='',$product_id=''){
    $sql="SELECT * FROM promo_products";

    if ($product_id!='') {
        $sql.=" WHERE id=$product_id";
    }

    if($type=='latest') {
        $sql.=" ORDER BY id DESC";
    }
    if($limit!='') {
        $sql.=" limit $limit";
    }
    $res=mysqli_query($con,$sql);
    $data=array();
    while($row=mysqli_fetch_assoc($res)) {
        $data[]=$row;
    }
    return $data;
}

//Get categories
function getCategories($con){
    $sql="SELECT id,categories FROM categories ORDER BY categories ASC";
    $res=mysqli_query($con,$sql);
    $data=array();
    while ($row=mysqli_fetch_assoc($res)) {
        $data[]=$row;
    }
    return $data;
}



?>


