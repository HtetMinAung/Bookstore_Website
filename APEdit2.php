<?php
session_start();

// Check if the user is logged in; otherwise, redirect to the login page
if (!isset($_SESSION["sess_user"])) {
    header("location: Login.php");
    exit();
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Edit Database Record</title>
        <link rel="stylesheet" type="text/css" href="Order.css" />
    </head>

    <body style="background-color: red;">
        <center>
            <p>
                <nav>
                    <div class="topnav" id="myTopnav">
                        <a href="APView.php">View Products</a>
                        <a href="APAdd.php">Add Product</a>
                        <a href="APEdit.php">Edit Product</a>
                        <a href="APDelete.php">Delete Product</a>
                        <a href="AOView.php">View Orders</a>
                        <h5>Welcome, <?=$_SESSION['sess_user'];?>!</h5>
                    </div>
                </nav>
            </p>
        </center>

        <?php
        $host = "localhost";
        $user = "root";
        $passwd = "";
        $database = "bucjunedb";
        $table_name = "product";

        // Connect to the database
        $connect = mysqli_connect($host, $user, $passwd, $database) or die("Could not connect to the database");

        // Select the database
        mysqli_select_db($connect, $database);

        // Get values from the form
        $pid = $_POST["pid"];
        $cname = $_POST["cname"];
        $pname = $_POST["pname"];
        $price = $_POST["price"];
        $name = $_FILES["pfile"]["name"];
        $target_dir = "images/";
        $target_file = $target_dir . $_FILES["pfile"]["name"];

        echo $name;
        echo $target_file;

        // Max file size (5MB)
        $maxsize = 5242880;

        // Valid file extensions
        $extensions_arr = array("png", "jpeg", "jpg");

        // Check file extension
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($imageFileType, $extensions_arr)) {
            // Check file size
            if ($_FILES['pfile']['size'] >= $maxsize || $_FILES["pfile"]["size"] == 0) {
                echo "File too large. File must be less than 5MB.";
            } else {
                // Update the database record
                $sql = "UPDATE $table_name SET catname='$cname',productname='$pname',price='$price',photo='".$target_file."' WHERE productid='".$pid."'";
                
                echo "<div class=entries>";
                echo "<h3 align=center>Edit Database Record</h3>";
                print "<center>";

                // Execute the SQL query
                if (!mysqli_query($connect, $sql)) {
                    die('Error: ' . mysqli_error($connect));
                }

                print "<p>Your information has been updated in the database</p>";
                mysqli_close($connect);
                print "</center>";
                echo "</div>";
            }
        } else {
            echo "Invalid file extension.";
        }
        ?>
    </body>

    </html>
<?php
}
?>
