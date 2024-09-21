<?php
    $host = "localhost";
    $user = "root";
    $passwd = "";
    $database = "bucjunedb";                        
    $conn = mysqli_connect($host,$user,$passwd,$database) 
    or die("could not connect to database");


    try {
        if(isset($_POST['productid'])){
            $customer = $_POST['customer'];
            $address = $_POST['address'];
            $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $age = isset($_POST['age']) ? $_POST['age'] : '';
            $book_details = isset($_POST['book_details']) ? $_POST['book_details'] : '';
            $other_info = isset($_POST['other_info']) ? $_POST['other_info'] : '';
            $sql = "INSERT INTO purchase(customer,telephone,email,age,book_details,total,date_purchase,address,delivery_datetime,other_info) VALUES ('$customer', '$telephone', '$email', $age, '$book_details', 0, NOW(), '$address', NOW(), '$other_info')";
            $conn->query($sql);
            $pid=$conn->insert_id;
     
            $total=0;
     
            foreach($_POST['productid'] as $product):
            $proinfo=explode("||",$product);
            $productid=$proinfo[0];
            $iterate=$proinfo[1];
            $sql="select * from product where productid='$productid'";
            $query=$conn->query($sql);
            $row=$query->fetch_array();
     
            if (isset($_POST['quantity_'.$iterate])){
                $subt=$row['price']*$_POST['quantity_'.$iterate];
                $total+=$subt;
                $sql="insert into purchase_detail(purchaseid, productid, quantity) values ('$pid', '$productid', '".$_POST['quantity_'.$iterate]."')";
                $conn->query($sql);
            }
            endforeach;
            
            $sql="update purchase set total='$total' where purchase_id='$pid'";
            $conn->query($sql);        
            session_start();
            $_SESSION['sess_pid']=$pid;        
            header('location:OrderSuccess.php');                
        }
        else{
            ?>
            <script>
                window.alert('Please select a product');
                window.location.href='Order.php';
            </script>
            <?php
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
    ?>
    
