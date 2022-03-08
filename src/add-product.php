<?php 

include("./classes/productopr.php");
 if(!isset($_SESSION['image'])){
        $_SESSION['image']='';
    }
if(isset($_POST['pname']))
{
  $action=$_POST['action'];
  echo $action;
  switch($action)
  {
    case 'addProduct':
      {
         $pname=$_POST['pname'];
         $category=$_POST['category'];
         $price=$_POST['price'];
         $quantity=$_POST['quantity'];
         $name=$_POST['name'];
         $email=$_POST['email'];
         //echo $filename;
         addProduct($pname,$category,$price,$quantity,$name,$email,$_SESSION['image']);
      }
  }
}
?>
<?php

if(!isset($_SESSION['filename']))
$_SESSION['filename']='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $filename = $_FILES['f-upload']['name'];
  $_SESSION['image']=$filename;
  if (isset($_SESSION['pics'])) {
      array_push($_SESSION['pics'], $filename);
  } else {
      $_SESSION['pics'] = array($filename);
  }
  $file = 'uploads/' . $_FILES['f-upload']['name'];
  
  if (isset($_POST['submit'])) {
     
      move_uploaded_file($_FILES['f-upload']['tmp_name'], $file);
      echo "uploaded Successfully!!!";
  }
}


// if (isset($_SESSION['pics'])) {
//   foreach ($_SESSION['pics'] as $p) {
//       //echo "<img src='uploads/$p'>";
//       //print_r($file);
//   }
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
    <title>Dashboard Template · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


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

    
    <!-- Custom styles for this template -->
    <link href="./assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Product</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <form class="row g-3" action="" method='post' enctype="multipart/form-data">
      <div>
        <h2>Product Image</h2>
       
            <input type="file" name="f-upload">
            <input type="submit" value="upload" name="submit" style="color:white; background-color:rgb(22,76,122); width:80px; height:40px;"><br><br>
    
    </div>
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail4" name="email">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputPassword4" name="name">
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Product Name</label>
          <input type="text" class="form-control" id="inputAddress" name="pname" placeholder="Product name">
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Product Category</label>
          <input type="text" class="form-control" id="inputAddress2" name="category" placeholder="category">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Price</label>
          <input type="integer" class="form-control" id="inputCity" name="price">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Qauntity</label>
          <input type="number" class="form-control" id="inputCity" name="quantity">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary" name='action' value='addProduct'>Add Product</button>
        </div>
      </form>      
    </main>
  </div>
</div>


    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>