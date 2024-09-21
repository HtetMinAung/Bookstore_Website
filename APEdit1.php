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
<img src="TMC-Logo-3.jpg" margin="auto" width="370px" height="110px"></img>
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
<?php
//print "<p>Edit Product Record</p>";
$host = "localhost";
$user = "root";
$passwd = "";
$database = "bucjunedb";
$table_name = "product";


$connect = mysqli_connect($host,$user,$passwd,$database) 
           or die("could not connect to database");


$productid = $_POST["pid"];
$query = "SELECT * FROM $table_name WHERE productid='".$productid."'";
mysqli_select_db($connect,$database);
$result = mysqli_query($connect,$query);
$myrow = mysqli_fetch_array($result,MYSQLI_ASSOC);


$productid=$myrow['productid'];
$catname=$myrow['catname'];
$pname=$myrow['productname'];
$price=$myrow['price'];
$photo=$myrow['photo'];
echo "<div class=entries>";
echo "<h3 align=center>Edit Database Record</h3>";
if (!$myrow)
{
  print "<center><p>No such record</p></center>";
}
else 
{
print "<center>";
print "<form name='APEditForm2' action='APEdit2.php' method='post' enctype='multipart/form-data'>
<table>
<tr><td>Product ID</td><td>$productid<input type='hidden' name='pid' value='$productid'></td></tr>
<tr><td>Category Name</td><td><input type='text' name='cname' value='$catname'></td></tr>
<tr><td>Product Name</td><td><input type='text' name='pname' value='$pname'></td></tr>
<tr><td>Price</td><td><input type='text' name='price' value='$price'></td></tr>
<tr><td>Photo</td><td><input type='file' name='pfile'></td></tr>
<tr><td><input type='submit' value='submit'><input type='reset' value='Reset Form'></td></tr>
</table>
</form>";


print "</center>";
mysqli_close($connect);
}
echo "</div>";
?>
Click here to <a href="Logout.php" title="Logout">Logout</a>
</body>
</html>
<?php
}
?>
