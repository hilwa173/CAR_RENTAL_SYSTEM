<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <link rel="stylesheet"  href="add_new_car.css">
</head>
<body>

  <?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carname = $_POST["car"];
    $year = $_POST["modelyear"];
    $type = $_POST["fueltype"];
    $transmission = $_POST["manual"];
    $capacity = $_POST["seating"];
    $cylinder = $_POST["cylndr"];
    $bodytype = $_POST["bdytyp"];
    $price = $_POST["pric"];

 
    $targetDir = "images/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetPath = $targetDir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));

    
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
         echo '<script>alert("Error: File is not an image.");</script>';
        $uploadOk = 0;
    }

    if ($_FILES["image"]["size"] > 5000000) {
       echo '<script>alert("Error: File is too large.");</script>';
        $uploadOk = 0;
    }


    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
         echo '<script>alert("Error:  Only JPG, JPEG, PNG, and GIF files are allowed.");</script>';
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
         echo '<script>alert("Error: Image upload failed.");</script>';
    } else {
    
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath)) {
            $sql = "INSERT INTO car_table (car_name, year, fuel_type, transmision, capacity, cylinder, body_type, price, image_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sisssisss", $carname, $year, $type, $transmission, $capacity, $cylinder, $bodytype, $price, $targetPath);

            if ($stmt->execute()) {
                echo "Car added successfully";
            } else {
                echo "Error adding car: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error: Image upload failed.";
        }
    }
}
?>

<a href="admin.php" class="back-button">&#8592;</a>

<div class="createform">
   <?php if ($_SERVER["REQUEST_METHOD"] != "POST"): ?>
   <h1>ADD NEW CAR</h1>
   <?php endif; ?>
   
   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
      <label for="car">Car Name:</label>
      <input type="text" name="car" required placeholder="Enter car name">
      
      <label for="modelyear">Year:</label>
      <input type="number" name="modelyear" required placeholder="Enter model year">
      
      <label for="fueltype">Fuel Type:</label>
      <input type="text" name="fueltype" required placeholder="Enter fuel type">
      
      <label for="manual">Transmission:</label>
      <input type="text" name="manual" required placeholder="Manual or automatic">
      
      <label for="seating">Capacity:</label>
      <input type="text" name="seating" required placeholder="Seating capacity">
      
      <label for="cylndr">Cylinder:</label>
      <input type="text" name="cylndr" required placeholder="Enter cylinder">
      
      <label for="bdytyp">Body Type:</label>
      <input type="text" name="bdytyp" required placeholder="Enter body type">
      
      <label for="pric">Price:</label>
      <input type="text" name="pric" required placeholder="Price per day">
      
      <label for="image">Image:</label>
      <input type="file" name="image" required accept="image/*">
      
      <input type="submit" value="ADD" class="submit">
   </form>
</div>

</body>
</html>
