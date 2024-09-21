<?php
session_start();
if(!isset($_SESSION["sess_user"])){
    header("location:Login.php");
} 
else {
?>
<!DOCTYPE html>
<html>
<head>
           <meta charset = 'utf-8'>
           <title>TMC Student Club</title>
          <link rel="stylesheet" type="text/css" href="Order.css"/>
</head>
<body>
<center>
<img src="TMC-Logo-3.jpg" margin="auto" width="370px" height="110px"></img>
<p>
<nav>
   <div class="topnav" id="myTopnav">
    <a href="APView.php">View Books</a>
    <a href="APAdd.php">Add Product</a>
    <a href="APEdit.php">Edit Product</a>
    <a href="APDelete.php">Delete Product</a>
    <a href="AReview.php">Review</a>
    <a href="AOView.php">View Orders</a>        
    <h5>Welcome, <?=$_SESSION['sess_user'];?>!</h5>         
   </div>
</nav>
</p>
</center>
<div class=entries>
<center><p><h1></h1>Log In successfull!!!!</p><h1></center>
Click here to <a href="Logout.php" title="Logout">Logout</a>
</div>   
</body>
</html>
<?php
}
?>
