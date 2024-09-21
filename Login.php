<?php
require("./bootstrap.php");
if (isset($_POST["submit"])) {
    if (!empty($_POST['user']) && !empty($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $con = mysqli_connect('localhost', 'root', '', 'bucjunedb');
        $query = mysqli_query($con, "SELECT * FROM users WHERE username='" . $user . "' AND password='" . $pass . "'");
        $numrows = mysqli_num_rows($query);
        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $dbusername = $row['username'];
                $dbpassword = $row['password'];
            }
            if ($user == $dbusername && $pass == $dbpassword) {
                session_start();
                $_SESSION['sess_user'] = $user;
                header("Location: AdminWelcome.php");
            }
        } else {
            $error =  "Invalid username or password!";
        }
    } else {
        $error = "Please fill all fields...";
    }
}
?>
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">
                            Login Form
                        </h3>
                        <?php
                        if (!empty($error)) {
                            echo "<div class='alert alert-danger' role='alert'>$error</div>";
                        }
                        ?>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            Username: <input type="text" name="user" class="form-control"><br />
                            Password: <input type="password" name="pass" class="form-control"><br />
                            <input type="submit" value="Login" name="submit" class="btn btn-success float-end text-white" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>