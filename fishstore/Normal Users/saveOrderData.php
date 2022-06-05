<?php
$host= "localhost";
$user="root";
$password="";
$db = "FishStore";
session_start(); 
$userID=$_SESSION['userID'];
$dbhandle=mysqli_connect($host,$user,$password);
mysqli_select_db($dbhandle,$db);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
   $data = $_POST['data'];
   $address = $_POST['address'];
   $total = $_POST['total'];
   $date = $_POST['date'];
   $sql = "insert into orders (date,status,cookedby,deliveredby,totalprice,address) values('".$date."','Received','','','".$total."','".$address."')";
   $result = mysqli_query($dbhandle,$sql);
   if($result){
    $orderID = mysqli_insert_id($dbhandle);
    for($i=0;$i<sizeof($data);$i++){
        $pid = $data[$i]["id"];
       $sql3 = "insert into order_product (order_id,product_id,product_name,cookingType,price) values('".$orderID."','".$data[$i]["id"]."','".$data[$i]["name"]."','".$data[$i]["cookingtype"]."','".$data[$i]["price"]."')";
       $result3 = mysqli_query($dbhandle,$sql3);
     }

    $sql2 = "insert into order_user (order_id,user_id) values('".$orderID."','".$userID."')";
    $result2 = mysqli_query($dbhandle,$sql2);
   }
 
   echo 1;


   
}

?>