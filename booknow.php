<!DOCTYPE html>
<html>
    <head>
        <title>Oasis Revers Hotel</title>
        <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php

include 'connection.php';

$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $full_name = $conn->real_escape_string($_POST['full_name']);
    $id_number = $conn->real_escape_string($_POST['id_number']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $package = $conn->real_escape_string($_POST['package']);

    $sql = "INSERT INTO booking (full_name, id_number, phone_number, package) 
            VALUES ('$full_name', '$id_number', '$phone_number', '$package')";

    if ($conn->query($sql) === TRUE) {
        $message = "<p style='color: green; font-weight: bold;'>Booking successful!</p>";
    } else {
        $message = "<p style='color: red; font-weight: bold;'>Error: " . $conn->error . "</p>";
    }
    
    $conn->close();
}
?>
  
    <div class="book">
        <form method="post">
            <br>
            <h1> BOOK NOW</h1>
            <br>
            <label for="name">1. full name</label><br>
            <input type="text" id="name" name="full name" required placeholder="enter the full name"><hr>

            <br>
            <label for="idnum">2. ID number</label><br>
            <input type="text" id="ID" name="ID" required placeholder="enter your ID number"><hr>

            <br>
            <label for="phone num">3. phone number</label><br>
            <input type="text" id="phone number" name="phone number" required placeholder="enter ther phone number" ><hr>

            <br>
            <label for="package">4. package</label><br>
            <select name="package" id="package">
                <option value="1"> special wedin package</option>
                <option value="2"> special room offers</option>
                <option value="2"> weekend buffert</option>
            </select>

            <button type="submit">submit</button>

        </form>
    </div>

     <div class="back">
        <a href="about.html">back</a>
    </div>
    


</body>
</html>