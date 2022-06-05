<?php

include_once "../../orderClass.php";
$host= "localhost";
$user="root";
$password="";
$db = "FishStore";

$dbhandle=mysqli_connect($host,$user,$password);
mysqli_select_db($dbhandle,$db);


  $sql = "select * from orders where status='Received'";
  $result = mysqli_query($dbhandle,$sql);
  $arrOfOrders=[];
    while($row =mysqli_fetch_array($result)){
        $order =new order();
        $order->set_id($row[0]);
        $order->set_date($row[1]);
        $order->set_status($row[2]);
        $order->set_cookedby($row[3]);
        $order->set_deliveriedby($row[4]);
        $order->set_price($row[5]);
        $order->set_address($row[6]);
        array_push($arrOfOrders,$order);
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
    <title>Dashboard</title>
</head>
<body>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <td>Order ID</td>
            <td>Order Date</td>
            <td>Order Status</td>
            <td>Cooked By</td>
            <td>Delivered By</td>
            <td>Total Price</td>
            <td>Address</td>
          </tr>
    </thead>
    <tbody>
     <?php
       for($i=0;$i<sizeof($arrOfOrders);$i++){
           $id = $arrOfOrders[$i]->get_id();
           $date = $arrOfOrders[$i]->get_date();
           $status = $arrOfOrders[$i]->get_status();
           $cookedby = $arrOfOrders[$i]->get_cookedby();
           $deliveredby = $arrOfOrders[$i]->get_deliveriedby();
           if($deliveredby==''){
             $deliveredby = "Not Delivered Yet";
           }
           if($cookedby==''){
            $cookedby = "Not Cooked Yet";
          }
           $price = $arrOfOrders[$i]->get_price();
           $address = $arrOfOrders[$i]->get_address();
           echo "
           <tr>
           <td>$id</td>
           <td>$date</td>
           <td>
        <span class=\"badge badge-success rounded-pill d-inline\">$status</span>
      </td>
           <td>$cookedby</td>
           <td>$deliveredby</td>
           <td>$price</td>
           <td>$address</td>
           </tr>
           ";
       }
       if(sizeof($arrOfOrders)==0){
        echo "<tr><td>No Orders Yet.</td></tr>";
    }
     ?>
    </tbody>
</table>
</body>
</html>