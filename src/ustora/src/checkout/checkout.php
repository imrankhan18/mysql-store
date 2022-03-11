<?php 
session_start();
require("../../../classes/config.php");
include_once("./display2.php");
include_once("./checkoutopr.php");
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// echo $_SESSION['cartdetails'][0]['user_id'];
if (isset($_POST['fname']) )
{   
    $userid=$_SESSION['cartdetails'][0]['user_id'];
    $fname =$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $address1=$_POST['add1'];
    $address2=$_POST['add2'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $zip=$_POST['zip'];
    $nameoncard=$_POST['ncard'];
    $creditnum=$_POST['cnum'];
    $expiry=$_POST['exp'];
    $cvv=$_POST['cvv'];
    checkoutdetails($userid, $fname, $lname, $username, $email, $address1, $address2, $country, $state, $zip, $nameoncard, $creditnum, $expiry, $cvv) ;
    //echo $userid;
}

// if (isset($_POST['pname']) )
// {
//     $productname =$_POST['pname'];
// }
function displayCheckoutd()
{
    $_SESSION['checkout']="";
    $_SESSION['checkout'].= "<div>
        <h4 class='mb-3'>Billing address</h4>
        <form action='./checkoutopr.php' method='post'><div class='col-md-7 col-lg-8'>
          <div class='row g-3'>
            <div class='col-sm-6'>
              <label for='firstName' class='form-label'>First name</label>
              <input type='text' class='form-control' id='firstName' placeholder='' value='' name='fname' required>
              <div class='invalid-feedback'>
                Valid first name is required.
              </div>
            </div>

            <div class='col-sm-6'>
              <label for='lastName' class='form-label'>Last name</label>
              <input type='text' class='form-control' id='lastName' placeholder='' value='' name='lname' required>
              <div class='invalid-feedback'>
                Valid last name is required.
              </div>
            </div>

            <div class='col-12'>
              <label for='username' class='form-label'>Username</label>
              <div class='input-group has-validation'>
                <span class='input-group-text'>@</span>
                <input type='text' class='form-control' id='username' placeholder='Username' required name='username'>
              <div class='invalid-feedback'>
                  Your username is required.
                </div>
              </div>
            </div>

            <div class='col-12'>
              <label for='email' class='form-label'>Email <span class='text-muted'>(Optional)</span></label>
              <input type='email' class='form-control' id='email' placeholder='you@example.com' name='email'>
              <div class='invalid-feedback'>
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class='col-12'>
              <label for='address' class='form-label'>Address</label>
              <input type='text' class='form-control' id='address placeholder='1234 Main St' required name='add1'>
              <div class='invalid-feedback'>
                Please enter your shipping address.
              </div>
            </div>

            <div class='col-12'>
              <label for='address' class='form-label'>Address 2 <span class='text-muted'>(Optional)</span></label>
              <input type='text' class='form-control' id='address2' placeholder='Apartment or suite' name='add2'>
            </div>

            <div class='col-md-5'>
              <label for='country' class='form-label'>Country</label>
              <select class='form-select' id='country' required name='country'>
                <option value=''>Choose...</option>
                <option>United States</option>
                <option>India</option>
                <option>Nepal</option>
                <option>Russia</option>
              </select>
              <div class='invalid-feedback'>
                Please select a valid country.
              </div>
            </div>

            <div class='col-md-4'>
              <label for='state' class='form-label'>State</label>
              <select class='form-select' id='state' required name='state'>
                <option value=''>Choose...</option>
                <option>California</option>
                <option>Uttar Pradesh</option>
                <option>Koilabas</option>
                <option>Russia</option>
              </select>
              <div class='invalid-feedback'>
                Please provide a valid state.
              </div>
            </div>

            <div class='col-md-3'>
              <label for='zip' class='form-label'>Zip</label>
              <input type='text' class='form-control' id='zip' placeholder='' required name='zip'>
              <div class='invalid-feedback'>
                Zip code required.
              </div>
            </div>
          </div>

          <hr class='my-4'>

          <div class='form-check'>
            <input type='checkbox' class='form-check-input' id='same-address' name='shipping'>
            <label class='form-check-label' for='same-address'>Shipping address is the same as my billing address</label>
          </div>

          <div class='form-check'>
            <input type='checkbox' class='form-check-input' id='save-info' name='save'>
            <label class='form-check-label' for='save-info'>Save this information for next time</label>
          </div>

          <hr class='my-4'>

          <h4 class='mb-3'>Payment</h4>

          <div class='my-3'>
            <div class='form-check'>
              <input id='credit' name='paymentMethod' type='radio' class='form-check-input' checked required name='credit'>
              <label class='form-check-label' for='credit'>Credit card</label>
            </div>
            <div class='form-check'>
              <input id='debit' name='paymentMethod' type='radio' class='form-check-input' required name='debit'>
              <label class='form-check-label' for='debit'>Debit card</label>
            </div>
            <div class='form-check'>
              <input id='paypal' name='paymentMethod' type='radio' class='form-check-input' required name='paypal'>
              <label class='form-check-label' for='paypal'>PayPal</label>
            </div>
          </div>

          <div class='row gy-3'>
            <div class='col-md-6'>
              <label for='cc-name' class='form-label'>Name on card</label>
              <input type='text' class='form-control' id='cc-name' placeholder='' required name='ncard'>
              <small class='text-muted'>Full name as displayed on card</small>
              <div class='invalid-feedback'>
                Name on card is required
              </div>
            </div>

            <div class='col-md-6'>
              <label for='cc-number' class='form-label'>Credit card number</label>
              <input type='text' class='form-control' id='cc-number' placeholder='' required name='cnum'>
              <div class='invalid-feedback'>
                Credit card number is required
              </div>
            </div>

            <div class='col-md-3'>
              <label for='cc-expiration' class='form-label'>Expiration</label>
              <input type='text' class='form-control' id='cc-expiration' placeholder='' required name='exp'> 
              <div class='invalid-feedback'>
                Expiration date required
              </div>
            </div>

            <div class='col-md-3'>
              <label for='cc-cvv' class='form-label'>CVV</label>
              <input type='text' class='form-control' id='cc-cvv' placeholder='' required name='cvv'>
              <div class='invalid-feedback'>
                Security code required
              </div>
            </div>
          </div>

          <hr class='my-4'>

          <button class='w-100 btn btn-primary btn-lg' name='submit' type='submit' >Place Order</button>
        </form>
      </div>";


}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Checkout example · Bootstrap v5.1</title>
    

    <!-- Bootstrap core CSS -->
<link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  
  <body class="bg-light">
    
<div class="container">
  <main>
  <div class="py-5 text-center">
  <h2>Checkout form</h2>
  <a href='..//cart.php'>Your cart</a>
  </div>
    <?php displaysecondcart();  ?>
    <?php echo $_SESSION ['cart2'] ;?>
    <?php displayCheckoutd(); ?>
    <?php  echo $_SESSION ['checkout']; ?>
   
      
    <!-- <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0" >Product name</h6>
              <small class="text-muted"><input name='pname'></small>
            </div>
            <span class="text-muted" name="pprice">price</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Second product</h6>
              <small class="text-muted"><input name='pname2'></small>
            </div>
            <span class="text-muted" name="pprice2" >Price</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Third Product</h6>
              <small class="text-muted"><input name='pname3'></small>
            </div>
            <span class="text-muted" name="pprice3">Price</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">−$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
          </li>
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form>
      </div> -->
  
      <!-- <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" placeholder="Username" required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" id="state" required>
                <option value="">Choose...</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder='' required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Save this information for next time</label>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Place Order</button>
        </form>
      </div> -->
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./assets/js/form-validation.js"></script>
  </body>
</html>
