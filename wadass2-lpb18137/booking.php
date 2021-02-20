<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Track & Trace Booking</title>
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
        <h2>Book an appointment</h2>
        <p>Book a track and trace appointment to come and visit the gallery.</p>

        <form action="bookingConfirmation.php" method="post">
            <label>Name
                <input type="text" id="name" name="name">
            </label>
            <br>
            <label>Phone Number
                <input type="text" id="phone_number" name="phone_number">
            </label>
            <br>
            <label>Date and Time
                <input type="datetime-local" id="date_and_time" name="date_and_time">
            </label>
            <br>
            <label>Address (House number and street name)
                <input type="text" id="address" name="address">
            </label>
            <br>
            <label>Postcode
                <input type="text" id="postcode" name="postcode">
            </label>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>