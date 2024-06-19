<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
    <link rel="stylesheet" href="viewcar.css">
</head>
<body>
    <a href="admin.php" class="back-button">&#8592;</a>
    <header class="admin-header">
        <h1>Welcome, Admin</h1>
        <a href="admin.php">Logout</a> <!-- Link to admin logout script -->
    </header>

    <main class="admin-main">
        <h2>Registered Customers</h2>

        <?php
        session_start();
        include("connection.php");

        // Check if admin is logged in
        if (!isset($_SESSION['admin_logged_in'])) {
            header('location: admin.php'); // Redirect to admin login page if not logged in
            exit;
        }

        // Fetch all customers from the customer_table
        $select_customers = mysqli_query($con, "SELECT * FROM customer_table");

        // Check if query executed successfully
        if (!$select_customers) {
            die("Error fetching customers: " . mysqli_error($con));
        }

        $customers = []; // Initialize an empty array

        // Fetch rows one by one and store in $customers array
        while ($row = mysqli_fetch_assoc($select_customers)) {
            $customers[] = $row;
        }
        ?>

        <?php if (!empty($customers)) : ?>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customers as $customer) : ?>
                        <tr>
                            <td><?php echo $customer['id']; ?></td>
                            <td><?php echo $customer['names']; ?></td>
                            <td><?php echo $customer['username']; ?></td>
                            <td><?php echo $customer['email']; ?></td>
                            <td><?php echo $customer['passwords']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>No customers found.</p>
        <?php endif; ?>
    </main>

</body>
</html>

<?php mysqli_close($con); // Close database connection ?>
