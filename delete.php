<?php
require"connection.php";
$id = $_POST['id'];

$sql = "DELETE FROM car_table WHERE id='$id'";
if ($con->query($sql) === TRUE) {
   $message="Record deleted successfully";
} else {
    $message="Error deleting record: " . $con->error;
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete </title>
    <link rel="stylesheet" href="viewcar.css"> 
</head>
<body>
    <div class="container">
        <h2>Delete</h2>
        <p><?php echo $message; ?></p>
        <a href="viewcarlist.php" class="button">Back to View Cars</a>
    </div>
</body>
</html>