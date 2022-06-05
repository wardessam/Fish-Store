<?php
 $user_id =$_GET['id'];

$host= "localhost";
$user="root";
$password="";
$db = "FishStore";

$dbhandle=mysqli_connect($host,$user,$password);
mysqli_select_db($dbhandle,$db);


  $sql = "delete from Users where id='".$user_id."'";
  $result = mysqli_query($dbhandle,$sql);
  if($result){
    echo "<script>alert('Deleted User successfully')</script>";
    echo("<script>window.location = 'show-del-user.php';</script>");
   
}
