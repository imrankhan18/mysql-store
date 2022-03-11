<?php

use App\DB;


require_once("../../../classes/DB.php");
include_once('./checkout.php');
include_once("./display2.php");
if (!isset($_SESSION['cartdetails'])) {
    $userid=$_SESSION['cartdetails'][0]['user_id'];
    function checkoutdetails(
        $userid,
        $fname,
        $lname,
        $username,
        $email,
        $address1,
        $address2,
        $country,
        $state,
        $zip,
        $nameoncard,
        $creditnum,
        $expiry,
        $cvv
    )

   {
    DB::getInstance()-> exec( "INSERT INTO checkout(user_id,f_name,l_name,user_name,email,address,address2,country,
    state,zip, nameoncard, card_num,expiry,cvv ) 
    VALUES('$userid','$fname','$lname','$username','$email','$address1','$address2','$country','$state','$zip','$nameoncard','$creditnum','$expiry','$cvv');"
    );
    deleteCart();
    htmlCartEmpty();
    header("location:./checkout.php");
    }
}


function getcart2()
{
    $stmt = DB::getInstance()->prepare("SELECT * FROM cart");
    $stmt->execute();
    $result=$stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function deleteCart()
{
        foreach($_SESSION['cartdetails'] as $k => $val){
            $cartid=$val['cart_id'];
            DB::getInstance()->exec("DELETE FROM cart where cart_id=$cartid");

        }
 

         
}
function htmlCartEmpty()
{  
            $_SESSION['cart2']="";
            displaysecondcart();
}
