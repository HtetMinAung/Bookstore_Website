<?php
session_start();
if(!isset($_SESSION["sess_user"])){
    header("location:login.php");
} 
else {
?>
<html>
<head>
    <meta charset = 'utf-8'>
    <title>TMC Student Club</title>
    <link rel="stylesheet" type="text/css" href="Order.css"/>
    <style>  
         .error {color: #FF0001;}  

         /* Table styles */
         table {
             border-collapse: collapse;
             width: 80%;
             margin: 0 auto; /* Centers the table */
         }
         th, td {
             border: 1px solid #ffff00;
             padding: 8px;
             text-align: left;
         }
         th {
             background-color: #f2f2f2;
         }
         tr:nth-child(even) {
             background-color: #f2f2f2;
         }
         tr:hover {
             background-color: #0001;
         }
         .text-right {
             text-align: right;
         }
         .page-header {
             margin-top: 20px;
         }
    </style>          
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
<div class="entries">
    <h1 class="page-header text-center">Orders</h1>
    <table>
        <thead>
            <th>Date</th>
            <th>Customer</th>
            <th>Total Sales</th>
            <th>Details</th>
        </thead>
        <tbody>
            <?php 
                $host = "localhost";
                $user = "root";
                $passwd = "";
                $database = "bucjunedb";                        
                $conn = mysqli_connect($host,$user,$passwd,$database) 
                or die("could not connect to database");


                $sql="select * from purchase order by purchase_id desc";
                $query=$conn->query($sql);
                while($row=$query->fetch_array()){
                    ?>
                    <tr>
                        <td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
                        <td><?php echo $row['customer']; ?></td>
                        <td class="text-right">&#8369; <?php echo number_format($row['total'], 2); ?></td>
                        
                        <td><a href="#details<?php echo $row['purchase_id'];?>">Details</a>
                        <?php include('AOViewDetail.php'); ?>
                    </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</div>
Click here to <a href="Logout.php" title="Logout">Logout</a>
 </body>
</html>
<?php
}
?>
