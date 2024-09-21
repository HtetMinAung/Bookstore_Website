<?php
require('./bootstrap.php');
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
          <style>  
             .error {color: #FF0001;}  
          </style>          
</head>
<body>
<center>
<p>
   <nav>
      <div class="topnav" id="myTopnav">
      <a href="APView.php">View Books</a>
      <a href="AOView.php">View Orders</a>        
      <h5>Welcome, <?=$_SESSION['sess_user'];?>!</h5>      
      </div>
   </nav>
   </p>
</center>


<div class="entries">
<h1 align="center">Registration Form</h1>
</br>
<form name="registerForm" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype='multipart/form-data'>
<table border=0 cellpadding=5 align="center">
<tr>
<td>Category Name :</td>
<td><input type="text" name="pcategory" size="30"></td>
</tr>
<tr>
   <td>Book Name</td>
   <td><input type="text" name="pname" size="30"></td>
</tr>
<tr>
    <td>Price</td>
    <td><input type="text" name="price" size="30"></td>
</tr>
<tr>
     <td>Photo</td>
     <td><input type="file" name="pfile"></td>
</tr>
<tr>
    <td colspan=2 style="text-align:center">
    <input type="submit" name="submit" value="submit">
    <input type="reset" value="Reset Form">
    </td>
</tr>
</table>
</form>
Click here to <a href="Logout.php" title="Logout">Logout</a>
<?php  
    if(isset($_POST['submit'])) 
    {         
      $host = "localhost";
      $user = "root";
      $passwd = "";
      $database = "bucjunedb";
      $table_name = "product";


       $connect = mysqli_connect($host,$user,$passwd,$database) 
       or die("could not connect to database");
       
                           
            //$name = $_FILES['pfile']['name'];
            $target_dir = "images/";
            $target_file = $target_dir . $_FILES["pfile"]["name"];
            $maxsize = 5242880; // 5MB


            // Select file type
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


            // Valid file extensions
            $extensions_arr = array("png","jpeg","jpg");


            // Check extension
            if( in_array($imageFileType,$extensions_arr) ){
                
                // Check file size
                if(($_FILES['pfile']['size'] >= $maxsize) || ($_FILES["pfile"]["size"] == 0)) {
                    echo "File too large. File must be less than 5MB.";
                }else
                {
                                        
                        // Insert record
                        $sql="INSERT INTO $table_name(catname,productname,price,photo)
                        VALUES('$_POST[pcategory]','$_POST[pname]','$_POST[price]','".$target_file."')";


                        if (!mysqli_query($connect,$sql))
                        {
                            die('Error: ' . mysqli_error($connect));
                        }
                        else{       
                        echo "<center>Successfully added</center>";       
                        }
                        mysqli_close($connect);  
                    }
                
            }else{
                echo "Invalid file extension.";
            }        
    }      
   

?>
</div>
</body>
</html>
<?php
}
?>
