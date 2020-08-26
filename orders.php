<?php 
require('dbconnect.php'); 
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="store.css">
</head>
<body>
<div class="menu-lists">  
<ul class="menu-list">
  <li><a class="active" href="">Orders</a></li>
  <li><a href="additems.php">Add Items</a></li>
  <li><a href="table.php">Products</a></li>
  <li><a href="logout.php">Log out</a></li>
</ul>
</div>
<div class="form">
<table id="customers">
<thead>
<tr>
<th>Date</th>
<th>Order ID</th>
<th>Name</th>
<th>Price</th>
<th>Edit</th>
</tr>
</thead>
    <tbody>
    <?php
    $count=1;
    $sel_query="Select DISTINCT * from ordertest ORDER BY orderid asc;";
    $result = mysqli_query($conn,$sel_query);
    while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
    <td><?php echo $row["orderid"]; ?></td>
    <td><?php echo $row["description"]; ?></td>
    <td><?php echo $row["price"]; ?></td>
    <td><?php echo $row["firstname"]; ?></td>
    <td><a href="viewitems.php?id=<?php echo $row["id"] ?>">Edit</a></td>
    </tr>
    <?php $count++; } ?>
    </tbody>
</table>
</div>
</body>
</html>