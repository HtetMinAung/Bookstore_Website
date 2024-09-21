<?php
session_start();
if(!isset($_SESSION["sess_pid"])){
    header("location:Order1.php");
} 
else {
?>
<html>
<head>
    <meta charset = 'utf-8'>
    <link rel="stylesheet" type="text/css" href="Order.css"/>
    <style>  
         .error {color: #FF0001;}  
    </style>          
</head>
<body>
<center>
<p>
 <nav>
    <div class="topnav" id="myTopnav">
       <a href="Home.html">Home</a>
       <a href="About.html">About</a>
       <a href="UPView.php">Food</a>
       <a href="Order.php">Order</a>
    </div>
 </nav>
</p>
</center>
<div class="entries">
<center>
    <h1 class="page-header text-center">Order Success!!!</h1>
    <P>  Thanks for your shopping with us </p>
    <p><h3>your order id is  <?=$_SESSION['sess_pid'];?>!</h3></p>
</center>
</div>
 </body>
</html>
<?php
}
?>
