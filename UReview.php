<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Heart - TMC Student Club</title>
<link rel="stylesheet" href="style.css">    
</head>
<body>
    <header>
        <div class="container">
            <h1>Welcome to <span class="highlight">Book Heart</span>
                <img src="images/book.png" alt="book.logo" height="35px" width="30px">
            </h1>
        </div>
    </header>

    <nav>
        <div class="container">
            <ul>
                <li><a href="Home.html">Home</a></li>
                <li><a href="About.html">About</a></li>
                <li><a href="Order.php">Order</a></li>
                <li><a href="UReview.php">Review</a></li>
                <li><a href="Login.php">Admin Log In</a></li>
            </ul>
        </div>
    </nav>


<div class="entries">
<h1 align="center">Review Form</h1>
</br>
<form name="registerForm" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype='multipart/form-data'>
<table border=0 cellpadding=5 align="center">


<tr>
<td>Customer Name :</td>
<td><input type="text" name="cname" size="30"></td>
</tr>
<tr>
    <td>Email</td>
    <td><input type="text" name="email" size="30"></td>
</tr>
<tr>
   <td>Product Name</td>
   <td><input type="text" name="pname" size="30"></td>
</tr>
<tr>
     <td>Comment</td>
     <td><input type="text" name="comment" size="50" ></td>
</tr>
<tr>
    <td colspan=2 style="text-align:center">
    <input type="submit" name="submit" value="submit"><input type="reset" value="Reset Form">
    </td>
</tr>
</table>
</form>
<?php  
    if(isset($_POST['submit'])) 
    {         
      $host = "localhost";
      $user = "root";
      $passwd = "";
      $database = "bucjunedb";
      $table_name = "review";


       $connect = mysqli_connect($host,$user,$passwd,$database) 
       or die("could not connect to database");


       $sql="INSERT INTO $table_name(customer,email,productname,comment,Date)
       VALUES('$_POST[cname]','$_POST[pname]','$_POST[email]','$_POST[comment]',NOW())";


        if (!mysqli_query($connect,$sql))
        {
            die('Error: ' . mysqli_error($connect));
        }
        else
        {       
        echo "<center>Successfully added</center>";       
        }
        mysqli_close($connect); 
    }
    ?>
    </div>
</body>
</html>
