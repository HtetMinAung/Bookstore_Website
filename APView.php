<?php
require("./bootstrap.php");
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
<p>
 <nav>
    <div class="topnav" id="myTopnav">
     <a href="APView.php">View Books</a>
      <a href="AOView.php">View Orders</a>   
      <a href="AReview.php">Reviews</a>     
      <h5>Welcome, <?=$_SESSION['sess_user'];?>!</h5>
       
    </div>
 </nav>
</p>
</center>

<div style="text-align: center; margin-top: 20px;">
    <button onclick="window.location.href = 'APAdd.php';">Add Book</button>
    <button onclick="window.location.href = 'APEdit.php';">Edit Book</button>
    <button onclick="window.location.href = 'APDelete.php';">Delete Book</button>
</div>


<div class=entries>  
<center>
<?php
$host = "localhost";
$user = "root";
$passwd = "";
$database = "bucjunedb";
$table_name = "product";
$connect = mysqli_connect($host,$user,$passwd,$database) 
            or die("could not connect to database");


$query = "SELECT * FROM $table_name";
mysqli_select_db($connect,$database);
$result = mysqli_query($connect,$query);


echo "<div color=red class=entries>";
echo "<h1 align=center>Book List</h1>";


if ($result) {
    print "<table class='table table-striped' align=center border=1>";
    print "<th>Product ID<th>Category<th>Name<th>Price<th>Photo";
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
      $pid=$row['productid'];
      $pcat=$row['catname'];
      $pname=$row['productname'];
      $price=$row['price'];
      $photo=$row['photo'];
      
      print "<tr>";      
     
        print "<td>".$pid."</td>";
        print "<td>".$pcat."</td>";
        print "<td>".$pname."</td>";
        print "<td>".$price."</td>";
        print "<td>"."<img src='".$photo."'controls width='100px' height='100px'>"."</td>";
              
     print "</tr>";
    }
    print "</table>";
}
else 
{ 
    die ("Query=$query failed!"); 
}
echo "</div>" ;
mysqli_close($connect);
?>
</center>
</div>
Click here to <a href="Logout.php" title="Logout">Logout</a>      
</body>
</html>
<?php
}
?>
