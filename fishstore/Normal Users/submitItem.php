<?php
include_once "../productClass.php";

$host= "localhost";
$user="root";
$password="";
$db = "FishStore";

$dbhandle=mysqli_connect($host,$user,$password);
mysqli_select_db($dbhandle,$db);

$product =new product();
$pros=[];
if(isset($_GET['id'])){
     $id =  $_GET['id'];
     $name = $_GET['name'];
     $price = $_GET['price'];
//     $sql = "insert into Users (name,email,password,usertype) values('".$username."','".$email."','".$pass."','".$usertype."')";
  //   $result = mysqli_query($dbhandle,$sql);
    // if($result){
     //}
    
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
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <title>Confirm Item</title>
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
            <h2>Confirm Product</h2>
          </div>

          <div class="divider d-flex align-items-center my-4">
           
          </div>

          <!-- ID -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Product ID:</label>
          <label id='id' class="form-label" for="form3Example3"><?php echo $id?></label>

          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Product Name:</label>
          <label id='name' class="form-label" for="form3Example3"><?php echo $name?></label>
            
          </div>
          <!-- Name -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Product Price:</label>
          <label id='price' class="form-label" for="form3Example3"><?php echo $price?></label>
            
          </div>
          
    
          <div class="form-outline mb-3">
          <div>
            <label class="form-label"><b>Cooking Type:</b></label>
            <select id="cooking" name="cooking">
                  <option disabled>--Select Type--</option>
                  <option value="Grilling">Grilling</option>
                  <option value="Baking">Baking</option>
                  <option value="Barbecuing">Barbecuing</option>
                  <option value="Microwave Cooking">Microwave Cooking</option>
                  <option value="Sousing">Sousing</option>
                  </select>
            </div>
          </div>


          <div class="text-center mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
               id="add"
              name='submit' style="padding-left: 2.5rem; padding-right: 2.5rem;">Add to Cart</button>
            
          </div>

        </form>
      </div>
    </div>
  </div> 
</section>
<script type="text/javascript">
  $("#add").click(function(e){
    e.preventDefault();
   if(localStorage.getItem('items') == null){
    var myArray =[];
}
else{
    myArray =  JSON.parse(localStorage.getItem('items'));
}

    var e = document.getElementById("cooking");
    var value = e.options[e.selectedIndex].value;
    let product= {
        id: document.getElementById("id").textContent,
        name: document.getElementById("name").textContent,
        price: document.getElementById("price").textContent,
        cookingtype:value
    }
    myArray.push(product);
    alert("Added Item to Cart!");
    localStorage.setItem('items', JSON.stringify(myArray));
    history.back();

})
</script>
</body>
</html>