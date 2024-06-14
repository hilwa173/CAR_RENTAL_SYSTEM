<?php
require"connection.php";
$id = $_POST['id'];

$sql = "DELETE FROM car_table WHERE id='$id'";
if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $con->error;
}

$con->close();
?>
