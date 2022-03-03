<?php 
include("../classes/helper.php");

if(isset($_POST)){
  $email=$_POST['uemail'];
  $upass=$_POST['upass'];
if($email!=""){
 echo $email;
  User($email,$upass);
}
}
?>
<!DOCTYPE html>
<!-- saved from url=(0051)https://getbootstrap.com/docs/5.1/examples/sign-in/ -->
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Signin</title>
  <link rel="stylesheet" href="./assets/css/signin.css">
  <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>





  <!-- Bootstrap core CSS -->
  <link href="./Signin Template · Bootstrap v5.1_files/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Favicons -->



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
  <link href="./Signin Template · Bootstrap v5.1_files/signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form action="" method="POST">
      <img class="mb-4" src="download.jpeg" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <!-- <div class="form-floating">
        <input name="uid" type="text" class="form-control" id="floatingInput" placeholder="user id">
        <label for="floatingInput">User Id</label>
      </div>

      <div class="form-floating">
        <input name="uname" type="text" class="form-control" id="floatingInput" placeholder="user name">
        <label for="floatingInput">User Name</label>
      </div> -->

      <div class="form-floating">
        <input name="uemail" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input name="upass" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-dark" type="submit">Sign in</button>
      <div class=" form-floating text-center">Don't have an account? <a href="signup.php">Sign Up</a></div>
      </div>
      <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
    </form>
  </main>





</body>

</html>