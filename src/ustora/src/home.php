<?php
use App\DB;

include("./helperproduct.php");
include_once("../../classes/DB.php");
    $perPage = 3;
    // Calculate Total pages
    $stmt = DB::getInstance()->query('SELECT count(*) FROM products');
    $total_results = $stmt->fetchColumn();
    $total_pages = ceil($total_results / $perPage);

    // Current page
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $starting_limit = ($page - 1) * $perPage;

    // Query to fetch products
    $query = "SELECT * FROM products ORDER BY product_id LIMIT $starting_limit,$perPage";


    $products = DB::getInstance()->query($query)->fetchAll();

function productListPagenation()
{
     global $starting_limit, $perPage;
     $stmt = DB::getInstance()->prepare("SELECT * FROM products ORDER BY product_id LIMIT $starting_limit, $perPage");
    
     $stmt->execute();

     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     return $stmt->fetchAll();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Home · Bootstrap v5.1</title>
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>





  <!-- Bootstrap core CSS -->
  <link href="./Signin Template · Bootstrap v5.1_files/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white"><a href="./cart.php">Cart</a></h4>
       
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <h6 class="text-white"><a href="../../admin/signin.php">Login</a></h6>
          <h6 class="text-white"><a href="../../admin/signup.php">SignUp</a></h6>
          <ul class="list-unstyled">
            <li><a href="http://www.twitter.com" class="text-white">Follow on Twitter</a></li>
            <li><a href="http://www.facebook.com" class="text-white">Like on Facebook</a></li>
            <li><a href="http://www.gmail.com" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Shop</strong>
      </a>
      <a href="../../dashboard.php" class="navbar-brand d-flex align-items-center">
        <strong>Dashboard</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">My Shop</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Shop Now</a>
          <a href="#" class="btn btn-secondary my-2">Subscribe</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
      <div class="container overflow-hidden">
        <form class="row row-cols-lg-auto align-items-center mt-0 mb-3">
            <div class="col-lg-6 col-12">
              <label class="visually-hidden" for="inlineFormInputGroupUsername">Search</label>
              <div class="input-group">
                <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Product, SKU, Category">
              </div>
            </div>
          
            <div class="col-lg-3 col-12">
              <label class="visually-hidden" for="inlineFormSelectPref">Sort By</label>
              <select class="form-select" id="inlineFormSelectPref">
                <option selected>Sort By</option>
                <option value="1">Price</option>
                <option value="2">Recently Added</option>
                <option value="3">Popularity</option>
              </select>
            </div>
          
            <div class="col-lg-3 col-12">
              <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
          </form>
      </div>
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php displayProduct();  ?>
        <?php echo $_SESSION['display']; ?>
        
        <!-- <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
                <h5>Fire TV Stick 4K</h5>
              <p class="card-text">Sample text below</p>
              <div class="d-flex justify-content-between align-items-center">
                <p><strong>$150</strong>&nbsp;<del><small class="link-danger">$180</small></del></p>
                <button class="btn btn-primary">Add To Cart</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                  <h5>Fire TV Stick 4K</h5>
                <p class="card-text">Sample text below</p>
                <div class="d-flex justify-content-between align-items-center">
                  <p><strong>$150</strong>&nbsp;<del><small class="link-danger">$180</small></del></p>
                  <button class="btn btn-primary">Add To Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                  <h5>Fire TV Stick 4K</h5>
                <p class="card-text">Sample text below</p>
                <div class="d-flex justify-content-between align-items-center">
                  <p><strong>$150</strong>&nbsp;<del><small class="link-danger">$180</small></del></p>
                  <button class="btn btn-primary">Add To Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                  <h5>Fire TV Stick 4K</h5>
                <p class="card-text">Sample text below</p>
                <div class="d-flex justify-content-between align-items-center">
                  <p><strong>$150</strong>&nbsp;<del><small class="link-danger">$180</small></del></p>
                  <button class="btn btn-primary">Add To Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                  <h5>Fire TV Stick 4K</h5>
                <p class="card-text">Sample text below</p>
                <div class="d-flex justify-content-between align-items-center">
                  <p><strong>$150</strong>&nbsp;<del><small class="link-danger">$180</small></del></p>
                  <button class="btn btn-primary">Add To Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                  <h5>Fire TV Stick 4K</h5>
                <p class="card-text">Sample text below</p>
                <div class="d-flex justify-content-between align-items-center">
                  <p><strong>$150</strong>&nbsp;<del><small class="link-danger">$180</small></del></p>
                  <button class="btn btn-primary">Add To Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                  <h5>Fire TV Stick 4K</h5>
                <p class="card-text">Sample text below</p>
                <div class="d-flex justify-content-between align-items-center">
                  <p><strong>$150</strong>&nbsp;<del><small class="link-danger">$180</small></del></p>
                  <button class="btn btn-primary">Add To Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                  <h5>Fire TV Stick 4K</h5>
                <p class="card-text">Sample text below</p>
                <div class="d-flex justify-content-between align-items-center">
                  <p><strong>$150</strong>&nbsp;<del><small class="link-danger">$180</small></del></p>
                  <button class="btn btn-primary">Add To Cart</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                  <h5>Fire TV Stick 4K</h5>
                <p class="card-text">Sample text below</p>
                <div class="d-flex justify-content-between align-items-center">
                  <p><strong>$150</strong>&nbsp;<del><small class="link-danger">$180</small></del></p>
                  <button class="btn btn-primary">Add To Cart</button>
                </div>
              </div>
            </div>
          </div> -->

          <div class="col">
          <nav aria-label="Page navigation example">
            <?php
            echo '<ul class=" pagination admin-pagination ">';
            if($page>1){
              echo '<li ><a href="home.php?page='.($page-1).'" class="btn btn-primary" >Prev&nbsp</a></li>';
            }
            
            for ($i =1; $i <= $total_pages ; $i++ ){ 
              
              if($i==$page) {
                    $active="active";
              } else {
                    $active="";
  
              }
            echo '<li class='.$active.'><a href="./home.php?page='.$i.'" class="btn btn-primary">'.$i.'&nbsp&nbsp&nbsp;</a></li>'; 
          }
          if($total_pages>$page){
          echo '<li><a href="home.php?page='.($page+1).'" class="btn btn-primary" >Next</a></li>';
          }
          echo '</ul>';
          ?>
        </nav>
          </div>
        
      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">&copy; CEDCOSS Technologies</p>
  </div>
</footer>


    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  </body>
</html>
