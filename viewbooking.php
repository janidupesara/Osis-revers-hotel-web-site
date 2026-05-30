<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details - Oasis Rivers Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="view-container">
        <?php
        
        include 'connection.php';

        
        if (isset($_POST['date']) && !empty($_POST['date'])) {
            $selected_date = $conn->real_escape_string($_POST['date']);
            echo "<h1>Booking for " . htmlspecialchars($selected_date) . "</h1>";
            
            
            $sql = "SELECT id, full_name, id_number, phone_number, package, booking_date 
                    FROM booking 
                    WHERE DATE(booking_date) = '$selected_date'";
        } else {
            echo "<h1>All Current Bookings</h1>";
            
            $sql = "SELECT id, full_name, id_number, phone_number, package, booking_date FROM booking";
        }

        $result = $conn->query($sql);
        echo "<br>";

        if ($result && $result->num_rows > 0) {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Full Name</th>";
            echo "<th>ID Number</th>";
            echo "<th>Phone Number</th>";
            echo "<th>Selected Package</th>";
            echo "<th>Booking Date & Time</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while($row = $result->fetch_assoc()) {
                // Map option values back to display text
                $package_name = "";
                switch ($row["package"]) {
                    case "1": $package_name = "Special Wedding Package"; break;
                    case "2": $package_name = "Special Room Offers"; break;
                    case "3": $package_name = "Weekend Buffet"; break;
                    default: $package_name = "Unknown Package";
                }

                $formatted_date = date("Y-m-d H:i", strtotime($row["booking_date"]));

                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["full_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["id_number"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["phone_number"]) . "</td>";
                echo "<td>" . htmlspecialchars($package_name) . "</td>";
                echo "<td>" . htmlspecialchars($formatted_date) . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p class='no-data' style='color: red; font-weight: bold;'>No booking records found.</p>";
        }

        $conn->close();
        ?>

        <br>
        <div class="back">
            <a href="date.php">Back to Date Search</a>
        </div>
        <div class="back">
            <a href="booknow.php">New Booking</a>
        </div>
    </div>

</body>
</html>