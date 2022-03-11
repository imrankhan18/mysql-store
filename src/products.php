<?php
use App\DB;

// include_once("./classes/DB.php");
include("./classes/productopr.php");
$perPage = 5;
$stmt = DB::getInstance()->query('SELECT count(*) FROM products');
$total_results = $stmt->fetchColumn();
$total_pages = ceil($total_results / $perPage);
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$starting_limit = ($page - 1) * $perPage;
$query = "SELECT * FROM products ORDER BY product_id DESC LIMIT $starting_limit,$perPage";
$products = DB::getInstance()->query($query)->fetchAll();
function productListPagenation2()
{
     global $starting_limit, $perPage;
     $stmt = DB::getInstance()->prepare("SELECT * FROM products ORDER BY product_id LIMIT $starting_limit, $perPage");
    
     $stmt->execute();

     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     return $stmt->fetchAll();
}

if (isset ($_POST['logout'])) {
    if ($_POST['logout'] == "yes") {
    // echo "yes";
        $_SESSION ['login'] = 'no';
        $_SESSION ['show'] = 'none';
        header("location:../admin/signin.php");
    }
}
if (isset($_POST)) {
    displayProduct();
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'edit':
                $_SESSION[' id '] = $_POST['id'];
                header("Location:edit_product.php");
                displayProduct();
                break;
            case 'delete':
                $id = $_POST['id'];
                deleteProduct($id);

        }
    }
}
//updateProduct($id, $pname, $category, $price, $quantity, $name, $email);
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
        <form action="" method="post"><button value="yes" name="logout" class="nav-link px-3 text-white bg-dark">Sign out</button></form>
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
              <a class="nav-link active" aria-current="page" href="./ustora/src/home.php">
                <span data-feather="home"></span>
                Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
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

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Products</h1>
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

        <form class="row row-cols-lg-auto g-3 align-items-center" action="" method="post">
          <div class="col-12">
            <label class="visually-hidden" for="inlineFormInputGroupUsername">Search</label>
            <div class="input-group">
              <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Enter id,name...">
            </div>
          </div>



          <div class="col-12">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
          <div class="col-12">
            <a class="btn btn-success" href="add-product.php">Add Product</a>
          </div>
        </form>
        <?php echo $_SESSION['p_disp']; ?>
        

        <nav aria-label="Page navigation example">
        <?php
            echo '<ul class=" pagination admin-pagination ">';
        if ($page > 1) {
              echo '<li ><a href="products.php?page='.($page-1).'" class="btn btn-primary" >Prev&nbsp</a></li>';
        }
            
        for ($i =1; $i <= $total_pages ; $i++)
        { 
              
              if($i==$page) {
                    $active="active";
              } else {
                    $active="";
  
              }
            echo '<li class='.$active.'><a href="./products.php?page='.$i.'" class="btn btn-primary">'.$i.'&nbsp&nbsp&nbsp;</a></li>'; 
          }
        if ($total_pages> $page) {
          echo '<li><a href="./products.php?page='.($page+1).'" class="btn btn-primary" >Next</a></li>';
          }
          echo '</ul>';
          ?>
        </nav>
    </div>
    </main>
  </div>
  </div>


  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>