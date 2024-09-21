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
<?php
$host = "localhost";
$user = "root";
$passwd = "";
$database = "bucjunedb";
$table_name = "product";


$connect = mysqli_connect($host,$user,$passwd,$database) or
die("could not connect to database");
mysqli_select_db($connect,$database);


$pid = $_POST["pid"];
$query = "SELECT * FROM $table_name WHERE productid='".$pid."'";
$sql = "DELETE FROM $table_name WHERE productid='".$pid."'";
mysqli_select_db($connect,$database);
$result = mysqli_query($connect,$query);
$myrow = mysqli_fetch_array($result,MYSQLI_ASSOC);
if (!$myrow)
{
print "<p>No such record</p>";
}
else 
{
mysqli_query($connect,$sql);
print "Member ID '$pid' has been deleted from the Database";
}
mysqli_close($connect);
print "</center>";
echo "</div>";
?>
</center>
</div>
Click here to <a href="Logout.php" title="Logout">Logout</a>
</body>
</html>
<?php
}
?>
/