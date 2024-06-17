<?php
session_start();
include("connection.php");

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header('location: admin.php'); // Redirect to admin login page if not logged in
    exit;
}

// Handle approve or reject action
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['approve'])) {
    $request_id = mysqli_real_escape_string($con, $_POST['request_id']);

    // Update status to approved in rental_table
    $update_query = mysqli_query($con, "UPDATE rental_table SET status = 'approved' WHERE id = '$request_id'");
    if ($update_query) {
        $_SESSION['success_message'] = "Rental request approved successfully.";
    } else {
        $_SESSION['error_message'] = "Failed to approve rental request. Please try again.";
    }
    header('location: approve.php');
    exit;
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reject'])) {
    $request_id = mysqli_real_escape_string($con, $_POST['request_id']);

    // Update status to rejected in rental_table
    $update_query = mysqli_query($con, "UPDATE rental_table SET status = 'rejected' WHERE id = '$request_id'");
    if ($update_query) {
        $_SESSION['success_message'] = "Rental request rejected successfully.";
    } else {
        $_SESSION['error_message'] = "Failed to reject rental request. Please try again.";
    }
    header('location: approve.php');
    exit;
}

// Fetch pending rental requests from rental_table
$select_requests = mysqli_query($con, "SELECT * FROM rental_table WHERE status = 'pending'");
$rental_requests = mysqli_fetch_all($select_requests, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve Rental Requests</title>
    <link rel="stylesheet" href="viewcar.css">
</head>
<body>
    <header>
        <h1>Welcome, Admin</h1>
        <a href="logout.php">Logout</a> <!-- Link to admin logout script -->
    </header>

    <main>
        <h2>Pending Rental Requests</h2>

        <?php if (!empty($_SESSION['success_message'])) : ?>
            <div class="success-message"><?php echo $_SESSION['success_message']; ?></div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['error_message'])) : ?>
            <div class="error-message"><?php echo $_SESSION['error_message']; ?></div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>

        <?php if (!empty($rental_requests)) : ?>
            <table>
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Car</th>
                        <th>Arrivals</th>
                        <th>Leaving</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rental_requests as $request) : ?>
                        <tr>
                            <td><?php echo $request['name']; ?></td>
                            <td><?php echo $request['car_id']; ?></td>
                            <td><?php echo $request['arrivals']; ?></td>
                            <td><?php echo $request['leaving']; ?></td>
                            <td>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <input type="hidden" name="request_id" value="<?php echo $request['id']; ?>">
                                    <button type="submit" name="approve">Approve</button>
                                    <button type="submit" name="reject">Reject</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No pending rental requests found.</p>
        <?php endif; ?>
    </main>

    <footer>
        <!-- Footer content here -->
    </footer>

</body>
</html>

<?php mysqli_close($con); // Close database connection ?>
