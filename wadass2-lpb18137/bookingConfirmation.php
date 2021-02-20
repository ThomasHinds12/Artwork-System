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
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $phone_number = strip_tags(isset($_POST["phone_number"]) ? $_POST["phone_number"] : "");
        $date_and_time = strip_tags(isset($_POST["date_and_time"]) ? $_POST["date_and_time"] : "");
        $address = strip_tags(isset($_POST["address"]) ? $_POST["address"] : "");
        $postcode = strip_tags(isset($_POST["postcode"]) ? $_POST["postcode"] : "");

        include "password.php";
        $servername = "devweb2020.cis.strath.ac.uk";
        $username = "lpb18137";
        $dbname = $username;
        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "INSERT INTO `Appointments` (`name`, `phone_number`, `date_and_time`, `address`, `postcode`) 
                        VALUES ('$name','$phone_number','$date_and_time','$address','$postcode')";

        if ($conn->query($sql)===FALSE){
            die ("Error on insert: ".$conn->error);
        }else{
            echo "<p>Appointment booked successfully. <a href='index.html'>Back to homepage</a></p>";
        }
        ?>
    </div>
</body>
</html>

