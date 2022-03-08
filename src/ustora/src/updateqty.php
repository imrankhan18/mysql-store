<?php
include_once("../../classes/DB.php");
if (isset($_POST)) {
    $cart_id = $_POST['cartid'];
    // echo $cart_id;
    $updated_value = $_POST['update-' . $cart_id];
    // echo $updated_value;
    updateQty($updated_value, $cart_id);
}

function updateQty($updated_value, $cart_id)
{
    DB::getInstance()->exec("UPDATE cart SET quantity='$updated_value' WHERE cart_id=$cart_id");
    header("location:cart.php");
}
