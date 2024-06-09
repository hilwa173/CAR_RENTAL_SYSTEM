<?php
require "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $user_name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO customer_table (names, username, email, passwords) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $user_name, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $con->close();
}
header("Location:indexx.php");
?>