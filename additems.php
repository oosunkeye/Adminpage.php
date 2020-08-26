<?php 
require('dbconnect.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<style>
    body{
        margin: 0px; 
        padding: 0px;
        font-family: "Trebuchet MS";
    }   
    
       ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 16%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 25px;      
  text-decoration: none;
  font-family: "Trebuchet MS";
  
}
    
li a.active {
  background-color: #555;
  color: white;
}

li a:hover:not(.active) {
  background-color: silver;
  color: white;
}

    
    .menu-list{
        padding-top:0px;
        margin-top: 0;
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
<div id="formWrapper">
<h2>Add Item:</h2>
<form method="post" action="//localhost/web/formprocess.php" enctype="multipart/form-data">
  <label for="description">Description:</label><br>
  <input type="text" id="description" name="description" value="" required><br>
  <label for="price">Price:</label><br>
  <input type="number" id="price" name="price" value="" required><br>
  <label for="quantity">Quantity:</label><br>
  <input type="number" id="quantity" name="quantity" min="1" max="5" required><br>
  <label>Image Upload</label>
  <input type="File" name="file"><br><br>
  <input type="submit" value="Submit">
</form> 
</div>
</body>
</html>
