<?php
 $order_id =$_GET['id'];
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
    <title>Deliver Order</title>
</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-10 col-lg-7 col-xl-6">
        <img src="../../Images/assign.png"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="post" action="">
          <div class="d-flex flex-row align-items-center justify-content-center">
            <h2>Deliver Order</h2>
          </div>

          <div class="divider d-flex align-items-center my-4">
           
          </div>

          <!-- ID -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Order ID:</label>
          <label class="form-label" for="form3Example3"><?php echo $order_id?></label>
            
          </div>
          <!-- Name -->
          <div class="form-outline mb-4">
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter Your Name" 
              name="username"/>
            <label class="form-label" for="form3Example3">Your Name</label>
          </div>
            



          <div class="text-center mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Submit</button>
            
          </div>

        </form>
      </div>
    </div>
  </div>
    
</section>
<?php

$host= "localhost";
$user="root";
$password="";
$db = "FishStore";

$dbhandle=mysqli_connect($host,$user,$password);
mysqli_select_db($dbhandle,$db);

if( isset($_POST['username'])){
  $username = $_POST['username'];
  $sql = "update orders set status='Delivered',deliveredby='".$username."' where id='".$order_id."'";
  $result = mysqli_query($dbhandle,$sql);
  if($result){
    echo "<script>alert('Order Set as Delivered successfully')</script>";
    echo("<script>window.location = 'dashboard.php';</script>");
  }
}
    ?>
</body>
</html>
