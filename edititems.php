<?php 
require('dbconnect.php'); 
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="store.css">
<style>
    body{
        margin: 0px;
        padding: 0px;   
        font-family: "Trebuchet MS";
    }   
    
    #formWrapper{
        width: 75%;
        margin-left:280px;
        padding: 10px;
    }
    
    input[type=text] {
      width: 35%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid black;
      border-radius: 4px;
      height: 45px;
     }
    
     input[type=number] {
      width: 15%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: 1px solid black;
      border-radius: 4px;
      
     }
    
   input[type=submit] {
      background-color: grey;
      border: none;
      color: white;
      padding: 16px 32px;
      text-decoration: none;
      margin: 4px 2px;
      cursor: pointer;
      font-weight: bold;
    }
    
/*
    input[type=File] {
      background-color: grey;
      border: none;
      color: white;
      padding: 16px 32px;
      text-decoration: none;
      margin: 4px 2px;
      cursor: pointer;
      font-weight: bold;
    }
    
*/
</style>    
    
    
</head>
<body>

<div class="menu-lists">  
<ul class="menu-list">
  <li><a class="active" href="orders.php">Orders</a></li>
  <li><a href="additems.php">Add Items</a></li>
  <li><a href="table.php">Products</a></li>
  <li><a href="logout.php">Log out</a></li>
</ul>
</div>
<?php

$id=$_REQUEST['id'];
$query = "SELECT * from products where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
$status = "";

if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$description =$_REQUEST['description'];
$price =$_REQUEST['price'];
$quantity =$_REQUEST['quantity'];

$update="update products set reg_date='".$trn_date."',
description='".$description."', price='".$price."',
quantity='".$quantity."' where id='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';

}else {
?>
<div id="formWrapper">
<h2>Edit Item:</h2>
<form method="post" action="" enctype="multipart/form-data">
  <input type="hidden" name="new" value="1" />
  <label for="description">Description:</label><br>
  <input type="text" id="description" name="description" value="<?php echo $row['description']; ?>" required><br>
  <label for="price">Price:</label><br>
  <input type="number" id="price" name="price" value="<?php echo $row['price'];?>" required><br>
  <label for="quantity">Quantity:</label><br>
  <input type="number" id="quantity" name="quantity" min="1" max="5" value="<?php echo $row['quantity'];?>" required><br>
  <label>Image Upload</label>
  <input type="File" name="file"><br><br>
  <input type="submit" value="Submit">
</form> 
<?php } ?>
</div>
</body>
</html>
