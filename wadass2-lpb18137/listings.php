<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Listings</title>
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
        <h2>Art Listings</h2>
        <?php
            include "password.php";
            $servername = "devweb2020.cis.strath.ac.uk";
            $username = "lpb18137";
            $dbname = $username;
            $conn = new mysqli($servername, $username, $password, $dbname);

            $sql = "SELECT * FROM `Listings`";
            $result = $conn->query($sql);

            if (!$result){
             die("Query failed ".$conn->error);
            }

            $result -> data_seek(0);

            if ($result->num_rows > 0) {
                $listings = array(array("id" => '', "name" => '', "price" => '', "description" => '', "date" => '', "width" => '', "height" => '',"image"=> ''));
                $index = 0;
                while (($row = $result->fetch_assoc())) {
                    $listings[$index] = array(
                        "id" => $row["id"],
                        "name" => $row["name"],
                        "price" => $row["price"],
                        "description" => $row["description"],
                        "date" => $row["date_of_completion"],
                        "width" => $row["width"],
                        "height" => $row["height"],
                        "image" => $row["image"]
                    );
                    $index++;
                }

                $initialCounter = strip_tags(isset($_GET["counter"]) ? $_GET["counter"] : 0);

                if ($initialCounter<=0){
                    $initialCounter = 0;
                }elseif ($initialCounter >= $result->num_rows) {
                    $initialCounter = $initialCounter - 12;
                }

                $counter = $initialCounter;
                $maxCounter = $counter+12;

                ?><div id='images'><?php
                while (($counter < $maxCounter)&&($counter < $result->num_rows)) {
                    echo "<p><a href = 'paintingInfo.php?id=".$listings[$counter]["id"]."'><img src = 'data:image/jpeg;base64,".base64_encode($listings[$counter]["image"])."' alt='".$listings[$counter]["description"]."'/>".$listings[$counter]["name"]."<br>£".$listings[$counter]["price"]."</a></p>\n";
                    $counter++;
                }
                ?>
                </div>
                <div id="listingsFooter">
                <?php
                echo "<p>Showing ".($initialCounter+1)." - $counter of $result->num_rows listings.</p>";

                echo "<p><a href='listings.php?counter=".($initialCounter-12)."'><button>Previous</button></a>";
                echo "<a href='listings.php?counter=".($initialCounter+12)."'><button>Next</button></a></p>";
                ?>
                </div>
                <?php
            }
        ?>
    </div>
</body>
</html>