<?php
    class add_to_cart{
        function addProduct($pid,$qty){
            $_SESSION['cart'][$pid]['qty']=$qty;
        }

        function compareProduct($pid,$qty,$ptype){
            $_SESSION['comp'][$pid]['qty']=$qty;
            $_SESSION['ptype']=$ptype;
        }

        function comparePromo($pid,$qty,$ptype){
            $_SESSION['promoComp'][$pid]['qty']=$qty;
            $_SESSION['ptype']=$ptype;
        }

        function updateProduct($pid,$qty){
            if (isset($_SESSION['cart'][$pid])) {
                $_SESSION['cart'][$pid]['qty']=$qty;
            }
        }

        function removeProduct($pid){
           unset($_SESSION['cart'][$pid]);
        }

        function removeComp($pid){
            unset($_SESSION['comp'][$pid]);
            unset($_SESSION['promoComp'][$pid]);
        }

        function emptyProduct(){
            unset($_SESSION['cart']);
        }

        function totalProduct(){
            if (isset($_SESSION['cart'])) {
                return count($_SESSION['cart']);
            }else{
                return 0;
            }
        }

        function noProduct(){
            if (isset($_SESSION['comp'])) {
                return count($_SESSION['comp']);
            }else{
                return 0;
            }
        }

        function noPromoProduct(){
            if (isset($_SESSION['promoComp'])) {
                return count($_SESSION['promoComp']);
            }else{
                return 0;
            }
        }
        


        
    }

?>