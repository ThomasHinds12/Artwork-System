<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Painting Info</title>
    <script src="scripts.js"></script>
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
            $id = strip_tags(isset($_GET["id"]) ? $_GET["id"] : "");

            include "password.php";
            $servername = "devweb2020.cis.strath.ac.uk";
            $username = "lpb18137";
            $dbname = $username;
            $conn = new mysqli($servername, $username, $password, $dbname);

            $sql = "SELECT * FROM `Listings` WHERE id=".$id;
            $result = $conn->query($sql);

            if (!$result){
                die("Query failed ".$conn->error);
            }

            $result -> data_seek(0);

            if ($result->num_rows > 0) {
                $row = $result -> fetch_assoc();


                echo "<div id='picture'><img src = 'data:image/jpeg;base64,".base64_encode($row['image'])."' alt='".$row["description"]."'/></div>";

                echo "<div id='info'></div><h2>".$row["name"]."</h2>";
                echo "<h3>£".$row["price"]."</h3>";
                echo "<p>".$row["width"]." x ".$row["height"]." mm</p>";
                echo "<p>".$row["description"]."<br>Completed on: ".$row["date_of_completion"]."</p>";
                echo "<p><a href='orderForm.php?id=".$row["id"]."&name=".$row["name"]."'><button>Order</button></a><button onclick=\"goBack()\">Back</button></p></div>";

            }
        ?>

    </div>

</body>
</html>
