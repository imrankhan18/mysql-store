<?php
// require_once("./helperproduct.php");

include("./addtocart.php");
// if(isset($_GET))
// {
//    $productid = $_GET['pid'];
//     //echo $productid;
//     $userid = $_SESSION['user_id'];
//     $quantity=1;
//     insertIntoCart($quantity, $userid, $productid);
// }

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
        <h2><a href="./cart.php">Cart</a></h2>
        <h2><a href="./home.php">Shop</a></h2>
      </div>
     
      <?php
      cartDisplay();
      echo $_SESSION['displaycart'];
      ?>

      

      <!-- <div class="row g-5">
      <div class="col order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">3</span>
        </h4>
        <table class="table">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>Soccer</td>
                <td>$100</td>
                <td>
                    <input type="text" class="w-20">
                    <input type="button" class="btn btn-secondary ms-1 w-20" value="update">
                    <a href="#" class="link-danger">Remove</a>
                </td>
                <td>$120</td>
            </tr>
            <tr>
                <td>Soccer</td>
                <td>$100</td>
                <td><input type="text" class="w-20">
                    <input type="button" class="btn btn-secondary ms-1 w-20" value="update">
                    <a href="#" class="link-danger">Remove</a></td>
                <td>$120</td>
            </tr>
            <tr>
                <td>Soccer</td>
                <td>$100</td>
                <td><input type="text" class="w-20">
                    <input type="button" class="btn btn-secondary ms-1 w-20" value="update">
                    <a href="#" class="link-danger">Remove</a>
                </td>
                <td>$120</td>
            </tr>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-end">$1000</td>
                </tr>
            </tfoot>
        </table>
      </div>
    </div> -->
      <div class="row g-5 align-items-right">
        <div class="col-3">
          <form>
            <button type="submit" class="btn btn-primary"><a href="./checkout.php " class="text text-white">Checkout</a></button>
          </form>
        </div>
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