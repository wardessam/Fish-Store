<?php

include_once "../userClass.php";
$host= "localhost";
$user="root";
$password="";
$db = "FishStore";

$dbhandle=mysqli_connect($host,$user,$password);
mysqli_select_db($dbhandle,$db);


  $sql = "select * from Users where usertype='worker'";
  $result = mysqli_query($dbhandle,$sql);
  $arrOfUsers=[];
    while($row =mysqli_fetch_array($result)){
        $user =new user();
        $user->set_id($row[0]);
        $user->set_name($row[1]);
        $user->set_email($row[2]);
        $user->set_password($row[3]);
        array_push($arrOfUsers,$user);
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Fish Store</a>
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Register Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="show-del-user.php">Show& Delete Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view-orders.php">Show Users Orders Progress</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="assign-workers.php">Assigning Workers</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <td>Worker ID</td>
            <td>Worker Name</td>
            <td>Worker Email</td>
            <td>Worker Password</td>
            <td>Options</td>
        </tr>
    </thead>
    <tbody>
     <?php
       for($i=0;$i<sizeof($arrOfUsers);$i++){
           $id = $arrOfUsers[$i]->get_id();
           $name = $arrOfUsers[$i]->get_name();
           $email = $arrOfUsers[$i]->get_email();
           $pass = $arrOfUsers[$i]->get_password();
           echo "
           <tr>
           <td name=\"id\">$id</td>
           <td>$name</td>
           <td>$email</td>
           <td>$pass</td>
           ";
           echo "
           <td><button name='submit' type='submit' class='btn btn-light'><a href='assignWorkerCode.php?id=$id&name=$name&email=$email'>Assign</button></td>
           </tr>
           ";
       }
       if(sizeof($arrOfUsers)==0){
           echo "<tr><td colspan=\"5\" >No Workers need Assignment.</td></tr>";
       }
     ?>
    </tbody>
</table>

</body>
</html>