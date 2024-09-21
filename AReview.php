<?php
require ("./bootstrap.php");
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
      <a href="#">Reviews</a>
      <h5>Welcome, <?=$_SESSION['sess_user'];?>!</h5>
       
    </div>
 </nav>
</p>
</center>


<div class=entries>  
<center>
<?php
$host = "localhost";
$user = "root";
$passwd = "";
$database = "bucjunedb";
$table_name = "review";
$connect = mysqli_connect($host,$user,$passwd,$database) 
            or die("could not connect to database");


$query = "SELECT * FROM $table_name";
mysqli_select_db($connect,$database);
$result = mysqli_query($connect,$query);


echo "<div color=red class=entries>";
echo "<h1 align=center>Customer Comments</h1>";


if ($result) {
    print "<table align=center border=1>";
    print "<th>ID<th>Customer Name<th>Email<th>Product Name<th>Comments<th>Date";
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
      $rid=$row['rid'];
      $customer=$row['customer'];
      $cemail=$row['email'];
      $pname=$row['productname'];
      $comment=$row['comment'];
      $cdate=$row['Date'];
      
      print "<tr>";  
        print "<td>".$rid."</td>";
        print "<td>".$customer."</td>";
        print "<td>".$cemail."</td>";
        print "<td>".$pname."</td>";
        print "<td>".$comment."</td>";
        print "<td>".$cdate."</td>";
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

