<?php

$host= "localhost";
$user="root";
$password="";
$db = "FishStore";

$dbhandle=mysqli_connect($host,$user,$password);
mysqli_select_db($dbhandle,$db);

if( isset($_POST['username'])){
  $username = $_POST['username'];
  $pass =$_POST['password'];
  $sql = "select *from Users where email ='".$username."' and Password='".$pass."'";
  $result = mysqli_query($dbhandle,$sql);
  if(mysqli_num_rows($result)==1){
    $row = $result -> fetch_row();
    $userID=$row[0];
    session_start();
    $_SESSION['userID'] = $userID;
    if($row[4]=='General Manager'){ 
    header('Location:General Manager/dashboard.php');
      exit();
    }
    else if($row[4]=='Delivery Department Manager'){
        header('Location:Delivery Department/Department Manager/dashboard.php');
        exit();
      }
    else if($row[4]=='Cooking Department Manager'){
        header('Location:Cooking Department/Department Manager/dashboard.php');
        exit();
      }
    else if($row[4]=='Selling Department Worker'){
        header('Location:Selling Department/Worker/dashboard.php');
        exit();
    }
    else if($row[4]=='Delivery Department Worker'){
        header('Location:Delivery Department/Worker/dashboard.php');
        exit();
      }
    else if($row[4]=='Cooking Department Worker'){
        header('Location:Cooking Department/Worker/dashboard.php');
        exit();
      }
    else{
        //Normal User
      header('Location:Normal Users/homepage.php');
      exit();

    }
    
  }
  else{
     echo '<script>alert("Please Enter a valid username or password!!")</script>'; ;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
     />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css"/>
    <!-- MDB -->
    <link
     href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"
       rel="stylesheet"
    />
    <!-- MDB -->
    <script
      type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"
     ></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>  
    <title>Login Page | Fish Food </title>
</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-10 col-lg-7 col-xl-6">
        <img src="Images/fish.jpg"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form id="form" method="post" action="">
          <div class="d-flex flex-row align-items-center justify-content-center">
            <h2>Login</h2>
          </div>

          <div class="divider d-flex align-items-center my-4">
           
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" 
              name="username"/>
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password"
              name="password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>


          <div class="text-center mt-4 pt-2">
            <button id="login" type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
             <a href="register.php" class="link-danger" name="register">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2020. All rights reserved.
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div>
      <a href="#" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
  </div>
</section>
<script>
  $("#login").click(function(e){
   localStorage.clear();
  })

</script>
</body>
</html>