<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
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

            $password = strip_tags(isset($_POST["password"]) ? $_POST["password"] : "");

            if ($password != "letMEin2020") {
                ?>
                <form action="admin.php" method="post">
                    <label>
                        Enter password for admin page
                        <input type="text" id="password" name="password">
                    </label>
                    <input type="submit" value="Submit">
                </form>
                <?php
                if ($password != ""){
                    echo "<p>Incorrect password. Please try again.</p>";
                }

            }else{

                include "password.php";
                $servername = "devweb2020.cis.strath.ac.uk";
                $username = "lpb18137";
                $dbname = $username;
                $conn = new mysqli($servername, $username, $password, $dbname);

                $sql = "SELECT * FROM `Orders`";
                $result = $conn->query($sql);

                if (!$result){
                    die("Query failed ".$conn->error);
                }

                $result -> data_seek(0);

                if ($result->num_rows > 0) {
                    echo"<h2>Orders</h2>";
                    echo "<table>\n";
                    ?>
                    <tr class="field_names">
                        <td>Order ID</td>
                        <td>Painting ID</td>
                        <td>Painting Name</td>
                        <td>Customer Name</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td>Address</td>
                    </tr>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>\n";
                        echo "<td>".$row["order_id"]."</td>\n";
                        echo "<td>".$row["painting_id"]."</td>\n";
                        echo "<td>".$row["painting_name"]."</td>\n";
                        echo "<td>".$row["customer_name"]."</td>\n";
                        echo "<td>".$row["phone_number"]."</td>\n";
                        echo "<td>".$row["email"]."</td>\n";
                        echo "<td>".$row["address"]."</td>\n";
                        echo "</tr>\n";
                    }
                    echo "</table>\n";
                }

                echo "<h2>Appointments</h2>";

                $sql = "SELECT * FROM `Appointments`";
                $result = $conn->query($sql);

                if (!$result){
                    die("Query failed ".$conn->error);
                }

                $result -> data_seek(0);

                if ($result->num_rows > 0) {
                    echo "<table>\n";
                    ?>
                    <tr class="field_names">
                        <td>ID</td>
                        <td>Name</td>
                        <td>Phone Number</td>
                        <td>Date and Time</td>
                        <td>Address</td>
                        <td>Postcode</td>
                    </tr>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>\n";
                        echo "<td>".$row["id"]."</td>\n";
                        echo "<td>".$row["name"]."</td>\n";
                        echo "<td>".$row["phone_number"]."</td>\n";
                        echo "<td>".$row["date_and_time"]."</td>\n";
                        echo "<td>".$row["address"]."</td>\n";
                        echo "<td>".$row["postcode"]."</td>\n";
                        echo "</tr>\n";
                    }
                    echo "</table>\n";
                }

            }
        ?>
</div>
</body>
</html>
