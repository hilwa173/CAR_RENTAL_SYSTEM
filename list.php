<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HIYOAM</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <div class="navigation1">
            <div class="X-image">
                <img src="/images/close.jpg" alt="x-image" onclick="closeham()">
            </div>
            <div class="ham-list">
                <ul>
                    <li onclick="closeham()"><a href="index.php#home">Home</a></li>
                    <li onclick="closeham()"><a href="list.php">Car List</a></li>
                    <li onclick="closeham()"><a href="index.php#about">About</a></li>
                    <li onclick="closeham()"><a href="index.php#contact">Contact</a></li>
                </ul>
            </div>
        </div>
        <a href="#" class="logo"><img src="images/logo1.png" alt="Car Rental Logo" /></a>
        <nav>
            <div class="nav-menu-btn" onclick="openham()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3 7C3 6.44772 3.44772 6 4 6H20C20.5523 6 21 6.44772 21 7C21 7.55228 20.5523 8 20 8H4C3.44772 8 3 7.55228 3 7ZM3 12C3 11.4477 3.44772 11 4 11L20 11C20.5523 11 21 11.4477 21 12C21 12.5523 20.5523 13 20 13L4 13C3.44772 13 3 12.5523 3 12ZM4 16C3.44772 16 3 16.4477 3 17C3 17.5523 3.44772 18 4 18H20C20.5523 18 21 17.5523 21 17C21 16.4477 20.5523 16 20 16H4Z" fill="#6070FF"/>
                </svg>
            </div>
            <ul class="nav-bar">
                <li><a href="index.php#home">Home</a></li>
                <li><a href="list.php">Car List</a></li>
                <li><a href="index.php#about">About</a></li>
                <li><a href="index.php#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <?php
    require_once "connection.php";
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
                    <h2>' . $price . ' <span>/day</span></h2>
                    <a href="#" class="btn">Rent Now</a>
                </div>';
        }

        echo '</div></section>';
    } else {
        echo "<p>No cars available.</p>";
    }
    ?>

    <script src="index.js"></script>
</body>
</html>