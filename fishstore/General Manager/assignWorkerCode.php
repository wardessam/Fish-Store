<?php

$id =$_GET['id'];
$name = $_GET['name'];
$email = $_GET['email'];
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
    <title>Assign Worker</title>
</head>
<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-10 col-lg-7 col-xl-6">
        <img src="../Images/assign.png"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="post" action="">
          <div class="d-flex flex-row align-items-center justify-content-center">
            <h2>Assign Worker</h2>
          </div>

          <div class="divider d-flex align-items-center my-4">
           
          </div>

          <!-- ID -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Worker ID:</label>
          <label class="form-label" for="form3Example3"><?php echo $id?></label>
            
          </div>
          <!-- Name -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Worker Name:</label>
          <label class="form-label" for="form3Example3"><?php echo $name?></label>
            
          </div>
          <!-- Email -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Worker Email:</label>
          <label class="form-label" for="form3Example3"><?php echo $email?></label>
            
          </div>

    
          <div class="form-outline mb-3">
          <select name="dept">
           <option value='Selling Department Worker'>Selling Department Worker</option>
           <option value='Delivery Department Worker'>Delivery Department Worker</option>
           <option value='Cooking Department Worker'>Cooking Department Worker</option>
           </select>
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

if( isset($_POST['dept'])){
  $dept = $_POST['dept'];
  $sql = "update Users set usertype='".$dept."' where id='".$id."'";
  $result = mysqli_query($dbhandle,$sql);
  if($result){
    echo "<script>alert('Assigned Worker successfully')</script>";
    echo("<script>window.location = 'assign-workers.php';</script>");
  }
}
    ?>
</body>
</html>