<?php
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $car_name = $_POST["car_name"];
    $year = $_POST["year"];
    $fuel_type = $_POST["fuel_type"];
    $transmision = $_POST["transmision"];
    $capacity = $_POST["capacity"];
    $cylinder = $_POST["cylinder"];
    $body_type = $_POST["body_type"];
    $price = $_POST["price"];
    $image_path = $_POST["image_path"];

    // Use prepared statements to update the record in the database
    $sql = "UPDATE car_table SET car_name=?, year=?, fuel_type=?, transmision=?, capacity=?, cylinder=?, body_type=?, price=?, image_path=? WHERE id=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sssssssssi", $car_name, $year, $fuel_type, $transmision, $capacity, $cylinder, $body_type, $price, $image_path, $id);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request";
}

$con->close();
?>
