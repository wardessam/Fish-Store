<?php
 session_start(); 
 $userID=$_SESSION['userID'];
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
    <title>Dashboard</title>
</head>
<body>
    
<h2>Your Order</h2>
<div class="form-outline">
<label class="form-control-outlined"><b>ID: </b></label>  
<label class="form-control-outlined"><?php echo $userID ?></label>
</div>
<table id="order" class="table table-striped table-hover">
    <thead>
        <tr>
            <td>Product Name</td>
            <td>Product Price</td>
            <td>Cooking Type</td>
        </tr>
    </thead>
</table>
<form>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" />
  <label class="form-check-label" for="inlineRadio1">Deliver to Address</label>
</div>

<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" />
  <label class="form-check-label" for="inlineRadio2">Take In place</label>
</div>
<div class="form-outline">
  <input type="text" id="address" class="form-control-outlined" placeholder="Enter Your Address"/>
</div>
<div class="form-outline">
<label class="form-control-outlined"><b>Total Price: </b></label>  
<label id="total" class="form-control-outlined"></label>
</div>
<div class="d-grid gap-2 col-6 mx-auto">
    <button  id="submit" type="submit" class="btn btn-danger btn-lg">Submit Order</button>
</div>
</form></form>

<script>
    let total =0;
    let data = JSON.parse(localStorage.getItem('items'));
    for(let i=0;i<data.length;i++){
    $('#order tr:last').after('<tr><td>'+data[i].name+'</td><td>'+data[i].price+'</td><td>'+data[i].cookingtype+'</td></tr>');
    total += parseInt(data[i].price);
    }
    $('#total').text(total);
    $("#submit").click(function(e){
      e.preventDefault();
      let address = $("#address").val();
      if(address=""){
          address="In Place";
      }
      var today = new Date();
      var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      $.ajax({
            method:"POST",
             url: "saveOrderData.php",
             type: 'POST',
             data:{
                 data,
                 total,
                 address,
                 date
             },
            dataType:"json",
            error:function(request, status, error){
              var val = request.responseText;
               alert("error"+val);
            },
            success:function(data) {
              if(data){
              alert("Order Submitted");
              localStorage.clear();
              history.back();
               }
               else{
              alert("No Data")
               
               }
            }
       })        


    })
</script>
</body>
</html>


