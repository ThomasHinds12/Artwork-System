<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Form</title>
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
        <h2>Order Form</h2>

        <?php
            $id = strip_tags(isset($_GET["id"]) ? $_GET["id"] : "");
            $name = strip_tags(isset($_GET["name"]) ? $_GET["name"] : "");
        ?>

        <form action='orderConfirmation.php' method="post">
            <label>Painting ID
                <input type="text" id="painting_id" name="painting_id" value=<?php echo $id ?>>
            </label>
            <br>
            <label>Painting Name
                <input type="text" id="painting_name" name="painting_name" value="<?php echo $name ?>">
            </label>
            <br>
            <label>Name
                <input type="text" id="customer_name" name="customer_name">
            </label>
            <br>
            <label>Phone number
                <input type="text" id="phone_number" name="phone_number">
            </label>
            <br>
            <label>Email
                <input type="text" id="email" name="email">
            </label>
            <br>
            <label>Postal Address
                <input type="text" id="address" name="address">
            </label>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
