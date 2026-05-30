<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oasis Revers Hotel - Select Date</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="centerbox">
            <form action="viewbooking.php" method="POST">
                <br>
                <h1>VIEW BOOKINGS BY DATE</h1>
                <br>
                
                <label for="booking_date">Select Date:</label><br><br>
                <input type="date" id="booking_date" name="date" required>
                <hr>
                <br>
                
                <button type="submit">View Bookings</button>
            </form>
        </div>
    </div>

    <div class="back">
        <a href="about.html">back</a>
    </div>
</body>
</html>