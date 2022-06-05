<?php

include_once "../productClass.php";
$host= "localhost";
$user="root";
$password="";
$db = "FishStore";

$dbhandle=mysqli_connect($host,$user,$password);
mysqli_select_db($dbhandle,$db);


  $sql = "select * from products";
  $result = mysqli_query($dbhandle,$sql);
  $arrOfPros=[];
    while($row =mysqli_fetch_array($result)){
        $product =new product();
        $product->set_id($row[0]);
        $product->set_name($row[1]);
        $product->set_price($row[2]);
        array_push($arrOfPros,$product);
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
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
    <link rel="stylesheet" href="../styles.css"/>
    <!-- MDB -->
    <link
     href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"
       rel="stylesheet"
    />
    <!-- MDB -->
    <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
    <title>HomePage | Fish Food </title>
</head>
<body>
<div class="card">
<h5 class="card-title">Welcome to Fish Store! Choose the products you want.</h5>
  <div class="card-body">
  <?php
  echo "<form id=\"add\"method='post'>";
  echo "<div class=\"d-flex align-items-center bg-light mb-4\">";
       for($i=0;$i<sizeof($arrOfPros);$i++){
           $id = $arrOfPros[$i]->get_id();
           $name = $arrOfPros[$i]->get_name();
           $price = $arrOfPros[$i]->get_price();
         echo "
           <div class=\"col-md-4 offset-md-2\">
           <div>
            <label class=\"form-label\"><b>Product Name:</b></label>
            <input name='name' value=\"$name\" disabled>
            </div>
            <div>
            <label class=\"form-label\"><b>Product Price:</b></label>
            <input name='price' value=\"$price\" disabled>
            </div>
           <button type=\"submit\" onclick=\"stopload()\" name='submit' class=\"btn btn-dark btn-sm\"><a href='submitItem.php?id=$id&name=$name&price=$price'>Add to Cart</button>
          </div>";
          if($i%2==0 && $i!=0){
            echo "</div>";
            echo "<div class=\"d-flex align-items-center bg-light mb-3\">";
           echo "<div class=\"col-md-4 offset-md-2\">
           <div>
            <label class=\"form-label\"><b>Product Name:</b></label>
            <input name='name' value=\"$name\" disabled>
            </div>
            <div>
            <label class=\"form-label\"><b>Product Price:</b></label>
            <input name='price' value=\"$price\" disabled>
            </div>
            
           <button type=\"submit\" onclick=\"stopload()\" name='submit' class=\"btn btn-dark btn-sm\"><a href='submitItem.php?id=$id&name=$name&price=$price'>Add to Cart</button>
          </div>";
          }
               
        }
    echo "</div>";
    echo "</form>";
    echo "
    ";
         
?>
</div>
</div>
<form method='post'>
<div class="d-grid gap-2 col-6 mx-auto">
    <button  id="submit" type="submit" class="btn btn-danger btn-lg">Check Out</button>
</div>
</form>
<script type="text/javascript">
  
  $("#submit").click(function(e){
    e.preventDefault();
    let order = localStorage.getItem('items');
    console.log(order); 
    window.location.href="submitOrder.php";  
  })

</script>
</body>
</html>