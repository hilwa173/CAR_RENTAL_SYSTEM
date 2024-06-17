
<?php
session_start();

// Check if user is logged in and include database connection
require_once "connection.php";

// Initialize variables
$user = null;
$car = null;
$error_message = "";
$success_message = "";

// Fetch user details from database
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $select_user = mysqli_query($con, "SELECT * FROM customer_table WHERE id = '$user_id'");
    if (!$select_user) {
        die('Query Failed: ' . mysqli_error($con));
    }
    $user = mysqli_fetch_assoc($select_user);
}

// Fetch car details based on car_id from GET parameter
if (isset($_GET['id'])) {
    $carId = mysqli_real_escape_string($con, $_GET['id']);
    $select_car = mysqli_query($con, "SELECT * FROM car_table WHERE id = '$carId'");
    if (!$select_car) {
        die('Query Failed: ' . mysqli_error($con));
    }
    $car = mysqli_fetch_assoc($select_car);
    if (!$car) {
        $error_message = "Car not found.";
    }
} else {
    // Redirect if car_id is not provided in URL
    $_SESSION['error_message'] = "Car ID not provided.";
    header('location: list.php');
    exit;
}

// Handle form submission if POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Sanitize inputs
    $car_id = mysqli_real_escape_string($con, $_POST['car_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $arrivals = mysqli_real_escape_string($con, $_POST['arrivals']);
    $leaving = mysqli_real_escape_string($con, $_POST['leaving']);

    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($arrivals) || empty($leaving)) {
        $error_message = "All fields are required.";
    } else {
        // Check if user already has a rental request or has rented this car
        $select_rental = mysqli_query($con, "SELECT * FROM rental_table WHERE user_id = '$user_id' AND status IN ('pending', 'approved')");
        if (!$select_rental) {
            die('Query Failed: ' . mysqli_error($con));
        }
        $existing_rental = mysqli_fetch_assoc($select_rental);

        if ($existing_rental) {
            $error_message = "You already have an active rental request or rental.";
        } else {
            // Check if email is already used for a rental request
            $check_email_rental = mysqli_query($con, "SELECT * FROM rental_table WHERE email = '$email' AND status IN ('pending', 'approved')");
            if (!$check_email_rental) {
                die('Query Failed: ' . mysqli_error($con));
            }
            $existing_email_rental = mysqli_fetch_assoc($check_email_rental);
            if ($existing_email_rental) {
                $error_message = "This email is already associated with a rental request or rental.";
            } else {
                // Insert data into rental_table
                $status = 'pending'; // Initial status for admin approval
                $insert_temp_rental = mysqli_query($con, "INSERT INTO rental_table (user_id, car_id, name, email, phone, address, arrivals, leaving, status) 
                                                        VALUES ('$user_id', '$car_id', '$name', '$email', '$phone', '$address', '$arrivals', '$leaving', '$status')");

                if ($insert_temp_rental) {
                    $success_message = "Rental request submitted successfully. Admin will review and approve it.";
                } else {
                    $error_message = "Failed to submit rental request. Please try again.";
                }
            }
        }
    }

    // Store messages in session for displaying in account.php
    $_SESSION['error_message'] = $error_message;
    $_SESSION['success_message'] = $success_message;

    // Redirect back to account.php with car_id
    header('location: account.php?id=' . $car_id);
    exit;
}

// Fetch user's rental status
$select_user_rental = mysqli_query($con, "SELECT * FROM rental_table WHERE user_id = '$user_id' AND car_id = '$carId' ORDER BY id DESC LIMIT 1");
if (!$select_user_rental) {
    die('Query Failed: ' . mysqli_error($con));
}
$user_rental = mysqli_fetch_assoc($select_user_rental);

mysqli_close($con); // Close database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
    <link rel="stylesheet" href="viewcar.css">
</head>

<body>
    <header>
        <h1>Welcome, <?php echo htmlspecialchars($user['names']); ?></h1>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        <p>Username: <?php echo htmlspecialchars($user['username']); ?></p>
        <a href="logout.php" id="lg">Logout</a> <!-- Link to logout script -->
    </header>

    <main>
       

        <?php if (!empty($_SESSION['success_message'])) : ?>
            <div class="success-message"><?php echo $_SESSION['success_message']; ?></div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['error_message'])) : ?>
            <div class="error-message"><?php echo $_SESSION['error_message']; ?></div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>

        <div class="car-details">
            <h2>Car Details</h2>
            <p>Car Name: <?php echo htmlspecialchars($car['car_name']); ?></p>
            <p>Model Year: <?php echo htmlspecialchars($car['year']); ?></p>
            <p>Fuel Type: <?php echo htmlspecialchars($car['fuel_type']); ?></p>
            <p>Transmission: <?php echo htmlspecialchars($car['transmision']); ?></p>
            <p>Seating Capacity: <?php echo htmlspecialchars($car['capacity']); ?></p>
            <p>Cylinder: <?php echo htmlspecialchars($car['cylinder']); ?></p>
            <p>Body Type: <?php echo htmlspecialchars($car['body_type']); ?></p>
            <p>Price per Day: <?php echo htmlspecialchars($car['price']); ?></p>
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . htmlspecialchars($car['id']); ?>" method="post" class="rent-form">
            <input type="hidden" name="car_id" class="cls" value="<?php echo htmlspecialchars($car['id']); ?>">
            <input type="text" placeholder="Your Name" name="name" class="cls" value="<?php echo htmlspecialchars($user['names']); ?>" required>
            <input type="email" placeholder="Your Email" name="email" class="cls" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            <input type="text" placeholder="Phone Number" name="phone" class="cls" required>
            <input type="text" placeholder="Address" name="address" class="cls" required>
            <input type="date" name="arrivals" class="cls" required>
            <input type="date" name="leaving" class="cls" required>
            <input type="submit" value="Submit" class="cls" name="submit">
        </form>

        <?php if ($user_rental) : ?>
            <div class="rental-status">
                <h2>Rental Status</h2>
                <p>Status: <?php echo ucfirst(htmlspecialchars($user_rental['status'])); ?></p>
                <?php if ($user_rental['status'] == 'approved') : ?>
                    <p>Your rental has been approved! Enjoy your ride.</p>
                <?php elseif ($user_rental['status'] == 'rejected') : ?>
                    <p>Unfortunately, your rental request was rejected.</p>
                <?php else : ?>
                    <p>Your rental request is pending approval.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </main>



</body>

</html>
