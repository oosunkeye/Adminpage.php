<?php

$id = $_REQUEST['id'];
require('dbconnect.php'); 
include("auth.php");

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="viewitem.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<ul class="menu-list">
  <li><a class="active" href="orders.php">Orders</a></li>
  <li><a href="additems.php">Add Items</a></li>
  <li><a href="table.php">Products</a></li>
  <li><a href="logout.php">Log out</a></li>
</ul>

<div id="customers">
<h1>Customer details:</h1>
 <?php
    $query = "SELECT * from ordertest where id='".$id."'"; 
    $result = mysqli_query($conn, $query) or die ( mysqli_error());
    $row = mysqli_fetch_assoc($result); 
    
    if(isset($_POST['new']) && $_POST['new']==1)
    {
        $id = $_REQUEST['id'];
        $pay = $_REQUEST['payment'];
        $ship = $_REQUEST['shipment'];

        $update="update ordertest set pay_status='".$pay."',
        delivery_status='".$ship."' where id='".$id."'";
        
        mysqli_query($conn, $update) or die(mysqli_error());
        header('Location: viewitems.php?id='. $row["id"]);

    }else {
    ?>
<table style="width:70%">
  <tr>
    <th>Shipping information: </th>
  </tr>
  <tr>
    <td>Name: <?php echo $row["firstname"]." ".$row["lastname"]; ?> <br>
    	Address: <?php echo $row["address"]; ?><br>
        City: <?php echo $row["city"]; ?> <br>
        Postal code: <?php echo $row["postal"]; ?> <br>
        Phone: <?php echo $row["phone"]; ?> <br>
    </td>
  </tr>
    
  <tr>
    <th>Item details: </th>
  </tr>
  <tr>
    <td>Payment status: <?php echo $row["pay_status"]; ?> <br>
    Shipping status: <?php echo $row["delivery_status"]; ?> <br>
    </td>
    </tr>
    <tr>
    <th>Order Details </th>
  </tr>
  <tr>
    <td>Item description: <?php echo $row["description"]; ?> <br>
    	Price: <?php echo $row["price"]; ?> <br>
        Size: n/a <br>
<!--        img: <?php echo $row["img"]; ?>  <br>-->
        <img src="http://localhost/web/ecommerce/images/davido.jpeg" alt="item description" width="200" height="200">
    </td>
  </tr>
</table>

    <div id="form">
        <h3>ACTION:</h3>
        <div id="form-inside">
        <form method="post" action="">
              <input type="hidden" name="new" value="1" />
              <label for="payment">Payment status:</label>
              <select name="payment" id="pay">
                <option value="Paid">Paid</option>
                <option value="Unpaid">Unpaid</option>
              </select><br><br>
            
            <label for="shipment">Delivery status:</label>
              <select name="shipment" id="ship">
                <option value="Shipped">Shipping</option>
                <option value="Processing">Processing</option>
              </select><br><br>
          <input type="submit" value="Submit">
        </form>
            </div>
    </div>
    
<?php $count++; } ?>
    </div>
</body>
</html>
