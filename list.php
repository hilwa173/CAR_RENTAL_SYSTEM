<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car List</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <header>
        <!-- Header content as per your design -->
    </header>

    <?php
    require_once "connection.php";

    // Fetch cars from database
    $sql = "SELECT * FROM car_table";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        echo '<section class="car-list" id="car-list">
                <div class="service">
                    <span>Best services</span>
                    <h1>Explore Our Top Deals<br> From Top Rated Dealers</h1>
                </div>
                <div class="service-container">';

        while ($row = $result->fetch_assoc()) {
            $carname = $row["car_name"];
            $year = $row["year"];
            $type = $row["fuel_type"];
            $transmission = $row["transmision"];
            $capacity = $row["capacity"];
            $cylinder = $row["cylinder"];
            $bdytyp = $row["body_type"];
            $price = $row["price"];
            $imagePath = $row["image_path"];
            $carId = $row["id"]; // Assuming 'id' is the primary key of your car_table

            echo '<div class="box">
                    <div class="box-img">
                        <img src="' . $imagePath . '" alt="Car Image">
                    </div>
                    <h3>' . $carname . '</h3>
                    <p>Model year: <span>' . $year . '</span></p>
                    <p>Fuel Type : <span>' . $type . '</span></p>
                    <p>Transmission : <span>' . $transmission . '</span></p>
                    <p>Seating Capacity : <span>' . $capacity . '</span></p>
                    <p>Cylinder : <span>' . $cylinder . '</span></p>
                    <p>Body Type: <span>' . $bdytyp . '</span></p>
                    <h2>' . $price . ' <span>/day</span></h2>';

            // Provide rent now link for each car
            if (isset($_SESSION['user_id'])) {
                // Link to account.php with car_id as a parameter
                echo '<a href="account.php?id=' . $carId . '" class="btn">Rent Now</a>';
            } else {
                echo '<a href="login.php" class="btn">Log in to Rent</a>';
            }

            echo '</div>';
        }

        echo '</div></section>';
    } else {
        echo "<p>No cars available.</p>";
    }

    mysqli_close($con); // Close database connection
    ?>

    <script src="index.js"></script>
</body>

</html>
