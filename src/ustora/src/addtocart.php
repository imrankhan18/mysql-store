<?php
// require_once("../../classes/DB.php");
include("helperproduct.php");


// if(isset($_GET)){
//     echo $_GET['pid'];
// }

if (isset($_POST)) {
    if (!isset($quantity)) {
        $quantity = 1;
    } elseif ($quantity = 1) {
        $quantity++;
    }

    if (isset($_POST['cart'])) {
        $productid = $_POST['cart'];
        echo $productid;
        $userid = $_SESSION['user_id'];
        
        $price=getPrice($productid);
        print_r( $price);
        // $price = $details['price'];
        // print_r("<h1>qwertttttttttttttttttttttt" . $price . "</h1>");

        insertIntoCart($quantity, $userid, $productid, $price);
    }
}





function insertIntoCart($quantity, $userid, $productid, $price)
{
    DB::getInstance()->exec(
        "INSERT INTO cart(quantity,user_id,product_id,price) 
        VALUES('$quantity', '$userid', '$productid','$price');"
    );
}

function fetchFromCart()
{

    $stmt = DB::getInstance()->prepare("SELECT * FROM cart");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetchAll();
}

function cartDisplay()
{
    $_SESSION['displaycart'] = '';
    $_SESSION['cartdetails'] = fetchFromCart();
    // $cart = new Cart();

    $_SESSION['displaycart'] .= "<form action='updateqty.php' method='post'><div class='row g-5'>
        <div class='col order-md-last'>
          <h4 class='d-flex justify-content-between align-items-center mb-3'>
            <span class='text-primary'>Your cart</span>
            <span class='badge bg-primary rounded-pill'></span>
          </h4>
          <table class='table'>
              <tr>
                  <th>Product ID</th>
                  <th>Cart ID</th>
                  <th>Quantity</th>
                  <th>Price/Piece</th>
                  
                     
                      

              </tr>";
    foreach (fetchFromCart() as $key => $v) {
        $_SESSION['displaycart'] .= "<tr>
                  <td>" . $v['product_id'] . "</td>
                  <td>" . $v['cart_id'] . "</td>
                  <td> <input type='text' class='w-20' value=" . $v['quantity'] . " name='update-" . $v['cart_id'] . "'></td>
                  <td>" . $v['price'] . "</td>
                <td>
                <button  class='btn btn-secondary ms-1 w-20'  name='cartid' value='" . $v['cart_id'] . "'>Update</button>
                <a href='updatecart.php?pid=" . $v['product_id'] . "'  class='link-danger'>Remove</a>
            
                </td>
              </tr>
              ";
    }
    $_SESSION['displaycart'] .= "<tfoot><tr>
        <td colspan='4' class='text-end'>$</td>
    </tr>
</tfoot>
</table>
</div>
</div></form>";
}

function getPrice($productid)
{
    $details = getProductList();
    //print_r($details);
    foreach ($details as $k => $val1){
        if($val1['product_id']==$productid)
        {
            return $val1['product_price'];
        }
    }
}
