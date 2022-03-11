<?php
include_once('./checkoutopr.php');
include_once("./checkout.php");
function displaysecondcart()
{
    $total_price=0;
    $cart2 = getcart2();
    $_SESSION['cart2'] = '';
    $_SESSION['cart2'] .="
    <h4 class='d-flex justify-content-between align-items-center mb-3'>
      <span class='text-primary'><a href='..//cart.php'>Your cart</a></span>
      <span class='badge bg-primary rounded-pill'></span>
    </h4>";
    for ($i = 0; $i<count($cart2); $i++) {
          $total_price += $cart2[$i]['price'];
           $_SESSION['cart2'].="<form action='' method='post' ><div class='row g-5'><div class='col-md-5 col-lg-4 order-md-last'> <ul class='list-group mb-3'>
           <li class='list-group-item d-flex justify-content-between lh-sm'>
             <div>
               <h6 class='my-0' name='pname' >Product ID:</h6>
               <small class='text-muted' >" . $cart2[$i]['product_id'] . "</small>
               <h6 class='my-0' name='pqty' >Quantity:</h6>
               <small class='text-muted' >" . $cart2[$i]['quantity'] . "</small>
             </div>
             <span class='text-muted' name='pprice'>Price:" . $cart2[$i]['price'] . "</span>
           </li>
       </ul>
       </div>
       </div>";
    }
    $_SESSION['cart2'] .= "<div class='col-md-5'><ul>
<li class='list-group-item d-flex justify-content-between'>
<span>Total (INR)</span>
<strong>" . $total_price . "</strong>
</li>
</ul>
</div>
</form>";
}
