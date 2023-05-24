<?php
    require('connection.inc.php');
    require('functions.inc.php');
    require('add_to_cart_inc.php');

    $pid=get_safe_value($con,$_POST['pid']);
    $qty=get_safe_value($con,$_POST['qty']);
    $type=get_safe_value($con,$_POST['type']);
    $ptype=get_safe_value($con,$_POST['ptype']);

    $obj=new add_to_cart();

    if ($type=='add') {
        $obj->compareProduct($pid,$qty,$ptype);
    }

    if ($type=='addPromo') {
        $obj->comparePromo($pid,$qty,$ptype);
    }

    if ($type=='remove') {
        $obj->removeComp($pid,$qty);
    }

    if ($type=='update') {
        $obj->updateProduct($pid,$qty);
    }

   // echo $obj->totalProduct();
 echo $obj->noProduct();
?>