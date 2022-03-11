<?php
use App\DB;
// include("./addtocart.php");
include_once("../../classes/DB.php");
if (isset($_GET['pid'])) {
    $id = $_GET['pid'];
    deletetable($id);
}

function deletetable($id)
{

    DB::getInstance()->exec("DELETE FROM cart WHERE product_id=$id");
    header("location:cart.php");
}
