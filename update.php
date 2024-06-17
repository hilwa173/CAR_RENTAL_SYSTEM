<?php
require "connection.php";  // Ensure this is the correct config file for database connection

// Check if 'id' is set in POST request
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Fetch existing data to populate the update form
    $sql = "SELECT * FROM car_table WHERE id='$id'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Populate form with existing data
        echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Update Car</title>
    <link rel='stylesheet' href='viewcar.css'>
</head>
<body>

<form method='post' action='process_update.php' enctype='multipart/form-data' class='update-form'>
    <input type='hidden' name='id' value='" . $row["id"] . "'>
    <label for='car_name'>Car Name:</label><br>
    <input type='text' id='car_name' name='car_name' value='" . $row["car_name"] . "'><br>
    
    <label for='year'>Model Year:</label><br>
    <input type='text' id='year' name='year' value='" . $row["year"] . "'><br>
    
    <label for='fuel_type'>Fuel Type:</label><br>
    <input type='text' id='fuel_type' name='fuel_type' value='" . $row["fuel_type"] . "'><br>
    
    <label for='transmision'>Transmission:</label><br>
    <input type='text' id='transmision' name='transmision' value='" . $row["transmision"] . "'><br>
    
    <label for='capacity'>Capacity:</label><br>
    <input type='text' id='capacity' name='capacity' value='" . $row["capacity"] . "'><br>
    
    <label for='cylinder'>Cylinder:</label><br>
    <input type='text' id='cylinder' name='cylinder' value='" . $row["cylinder"] . "'><br>
    
    <label for='body_type'>Body Type:</label><br>
    <input type='text' id='body_type' name='body_type' value='" . $row["body_type"] . "'><br>
    
    <label for='price'>Price:</label><br>
    <input type='text' id='price' name='price' value='" . $row["price"] . "'><br>
    
    <label for='current_image_path'>Current Image Path:</label><br>
    <input type='text' id='current_image_path' name='current_image_path' value='" . $row["image_path"] . "' readonly><br>
    
    <label for='image'>New Image:</label><br>
    <input type='file' id='image' name='image'><br>
    
    <input type='submit' value='Update'>
</form>

</body>
</html>";
    } else {
        echo "Record not found";
    }
} else {
    echo "Invalid request. ID is missing.";
}

$con->close();
?>
