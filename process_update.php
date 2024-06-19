<?php
require "connection.php";  
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $car_name = $_POST['car_name'];
    $year = $_POST['year'];
    $fuel_type = $_POST['fuel_type'];
    $transmision = $_POST['transmision'];
    $capacity = $_POST['capacity'];
    $cylinder = $_POST['cylinder'];
    $body_type = $_POST['body_type'];
    $price = $_POST['price'];
    $current_image_path = $_POST['current_image_path'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "images/";
        $image_name = basename($_FILES["image"]["name"]);
        $image_path = $target_dir . $image_name;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_path)) {
            $sql = "UPDATE car_table SET 
                        car_name='$car_name', 
                        year='$year', 
                        fuel_type='$fuel_type', 
                        transmision='$transmision', 
                        capacity='$capacity', 
                        cylinder='$cylinder', 
                        body_type='$body_type', 
                        price='$price', 
                        image_path='$image_path' 
                    WHERE id='$id'";

            if ($con->query($sql) === TRUE) {
                $message = "Record updated successfully";
            } else {
                $message = "Error updating record: " . $con->error;
            }
        } else {
            $message = "Error uploading the file.";
        }
    }
     else {
        $sql = "UPDATE car_table SET 
                    car_name='$car_name', 
                    year='$year', 
                    fuel_type='$fuel_type', 
                    transmision='$transmision', 
                    capacity='$capacity', 
                    cylinder='$cylinder', 
                    body_type='$body_type', 
                    price='$price'
                WHERE id='$id'";

        if ($con->query($sql) === TRUE) {
            $message = "Record updated successfully";
        } else {
            $message = "Error updating record: " . $con->error;
        }
    }
} else {
    $message = "Invalid request. ID is missing.";
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status</title>
    <link rel="stylesheet" href="viewcar.css"> 
</head>
<body>
    <div class="container">
        <h2>Update Status</h2>
        <p><?php echo $message; ?></p>
        <a href="viewcarlist.php" class="button">Back to View Cars</a>
    </div>
</body>
</html>
