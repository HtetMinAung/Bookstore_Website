<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Heart - TMC Student Club</title>
<link rel="stylesheet" href="Order.css">    
<style>body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa; 
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0; 
}

header {
    background-color: #343a40;
    color: white;
    padding: 15px 0;
    text-align: center; 
}
.highlight {
    color: hsl(352, 92%, 52%); 
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    text-align: center;
}

nav li {
    display: inline;
    margin-right: 10px;
}

nav a {
    color: rgb(18, 1, 1);
    text-decoration: none;
    font-weight: bold;
    font-size: 16px;
    transition: color 0.3s ease-in-out; 
}

nav a:hover {
    color: #0755ff; 
}

main {
    flex: 1;
}

footer {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}
</style>
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
<h1>ORDER</h1>
    <form method="POST" action="Order1.php">
        <table class='table table-striped'Border=1 >
            <thead>
                <th class="text-center"><input type="checkbox" id="checkAll"></th>
                <th>Category</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </thead>
            <tbody>
            <?php  
    $host = "localhost";
    $user = "root";
    $passwd = "";
    $database = "bucjunedb";                        
    $conn = mysqli_connect($host, $user, $passwd, $database) 
        or die("could not connect to database");
    $sql = "select * from product order by productname asc";                    
    $query = $conn->query($sql);
    $iterate = 0;
    while($row = $query->fetch_array()){
        ?>
        <tr>
            <td class="text-center">
                <input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style="">
            </td>
            <td><?php echo $row['catname']; ?></td>
            <td><?php echo $row['productname']; ?></td>
            <td class="text-right">&#8369; <?php echo number_format($row['price'], 2); ?></td>
            <td><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>"></td>
        </tr>
        <?php
        $iterate++;
    }
?>           
            </tbody>
        </table>
        <div class="row">

        <div class="col-md-3">
            Customer Name<input type="text" name="customer" required>
        </div>
        <div class="col-md-3">
            Telephone Number<input type="tel" name="telephone" required>
        </div>
        <div class="col-md-3">
            E-Mail Address<input type="email" name="email" required>
        </div>
        <div class="col-md-3">
            Age<input type="number" name="age" required>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            Details of the Book<input type="text" name="book_details" required>
        </div>
        <div class="col-md-6">
            Delivery Address<input type="text" name="delivery_address" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            Date and Time of Delivery<input type="datetime-local" name="delivery_datetime" required>
        </div>
        <div class="col-md-6">
            Any Other Information<textarea name="other_information"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2" style="margin-left: -20px;">
            <button type="submit" class="btn btn-primary" name="submit">
                <span class="glyphicon glyphicon-floppy-disk"></span> Save
            </button>
        </div>
    </div>
    </form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#checkAll").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    });
</script>
</body>
</html>