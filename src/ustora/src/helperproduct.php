<?php
session_start();
include("../../classes/productfetch.php");
// include_once("./addtocart.php");
function getProductList()
{
    $product = new Product();
    return $product->getProductList();
}
// function getProductDetail($id)
// {
//     $product=new Product();
//     return $product->getProductDetail($id);

// }



function displayProduct()
{
    $details = productListPagenation();
    $_SESSION['display'] = "";
    foreach ($details as $key => $value) {
        $_SESSION['display'] .= "<form action='cart.php' method='post'><div class='col'>
    <div class='card shadow-sm'>
        <img src='../../uploads/" . $value['product_image'] . "' alt='pic' width='30%'  height='150'>
      <div class='card-body'>
      
          <a href='single-product.php?id=" . $value['product_id'] . "'><strong>Product:" . $value['product_name'] . "</strong></a>
        <p class='card-text'><strong>Category:" . $value['product_category'] . "</strong></p>
        <div class='d-flex justify-content-between align-items-center'>
          <p name='price' ><strong>Price:" . $value['product_price'] . "</strong>&nbsp;</p>
        </div>
        <div class='d-flex justify-content-between align-items-center'>
          <p><strong>Quantity:" . $value['product_quantity'] . "</strong>&nbsp;</p>
          <button class='btn btn-primary' name='cart' value='". $value['product_id'] . "' >Add To Cart</button>
        </div>
      </div>
    </div>
  </div></form>";
    }
    //echo $_SESSION['display'];
}
function singleProductDisplay($id)
{
    $details = getProductList();
    foreach ($details as $key => $val) {
        if ($id == $val['product_id']) {
            $singledetails = $val;
        }
    }
    //$_SESSION['displayp']="";
    $_SESSION['displayp'] = "  <section class='py-5'>
        
    <div class='container px-4 px-lg-5 my-5'>
    
        <div class='row gx-4 gx-lg-5 align-items-center'>
            <div class='col-md-6'><img src='../../uploads/" . $singledetails['product_image'] . "' alt='pic' ></div>
            <div class='col-md-6'>
                <div class='small mb-1>SKU: BST-498</div>
                <p class='card-text'><strong>PSKU:" . $singledetails['product_id'] . "</strong></p>
                <h1 class='display-5 fw-bolder'>" . $singledetails['product_name'] . "</h1>
                <div class='fs-5 mb-5'>
                    <span class='text-decoration-line-through'></span>
                    <span>" . $singledetails['product_price'] . "</span>
                </div>
                <p class='lead>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                 Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, 
                accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                <div class='d-flex'>
                
                    <input class='form-control text-center me-3' id='inputQuantity' type='num' value='" . $singledetails['product_quantity'] . "' style='max-width: 3rem' />
                    <button class='btn btn-outline-dark flex-shrink-0' type='button'>
                        <i class='bi-cart-fill me-1'></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>";
}
