<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div id="header">
        <a href="index.html"><h1>CARA <strong>ART</strong></h1></a>
    </div>

    <div id="nav_bar">
        <a href = "index.html">Home</a>
        <a href = "listings.php">Art Listings</a>
        <a href = "booking.php">Book an Appointment</a>
        <a href = "admin.php">Admin</a>
    </div>

    <div id="main">
        <?php
            $painting_id = isset($_POST["painting_id"]) ? $_POST["painting_id"] : "";
            $painting_name = strip_tags(isset($_POST["painting_name"]) ? $_POST["painting_name"] : "");
            $customer_name = strip_tags(isset($_POST["customer_name"]) ? $_POST["customer_name"] : "");
            $phone_number = strip_tags(isset($_POST["phone_number"]) ? $_POST["phone_number"] : "");
            $email = strip_tags(isset($_POST["email"]) ? $_POST["email"] : "");
            $address = strip_tags(isset($_POST["address"]) ? $_POST["address"] : "");

            include "password.php";
            $servername = "devweb2020.cis.strath.ac.uk";
            $username = "lpb18137";
            $dbname = $username;
            $conn = new mysqli($servername, $username, $password, $dbname);

            $sql = "INSERT INTO `Orders` (`painting_id`, `painting_name`, `customer_name`, `phone_number`, `email`, `address`) 
                    VALUES ('$painting_id','$painting_name','$customer_name','$phone_number','$email','$address')";

            if ($conn->query($sql)===FALSE){
                die ("Error on insert: ".$conn->error);
            }else{
                echo "<p>Order placed successfully. <a href='index.html'>Back to homepage</a></p>";
            }
        ?>
    </div>
</body>
</html>
