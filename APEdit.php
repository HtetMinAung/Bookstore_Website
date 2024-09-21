<?php
session_start();
if(!isset($_SESSION["sess_user"])){
    header("location:Login.php");
} 
else {
?>
<html>
<head>
           <meta charset = 'utf-8'>
           <title>View Database Record</title>
           <link rel="stylesheet" type="text/css" href="Order.css"/>          
</head>
<body>
<center>
<p>
<nav>
   <div class="topnav" id="myTopnav">
      <a href="APView.php">View Products</a>
      <a href="AOView.php">View Orders</a>        
      <h5>Welcome, <?=$_SESSION['sess_user'];?>!</h5>          
   </div>
</nav>
</p>
</center>


<div class=entries>
<h2 align=center>Edit Product Record</h2>
<center>
<p>Please enter the Product ID you want to edit</p>
<form name="APEditForm1" action ="APEdit1.php" method="post">
<table>
<tr>
<td>Product ID</td>
<td><input type="text" name="pid" size="10"></td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="submit"/>
                <input type="reset" value="Reset Form"/></td>
</tr>
</table>
</form>
</center>
</div>
Click here to <a href="Logout.php" title="Logout">Logout</a>
</body>
</html>
<?php
}
?>
