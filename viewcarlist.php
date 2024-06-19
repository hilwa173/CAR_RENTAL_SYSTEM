<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view car</title>
    <link rel="stylesheet" href="viewcar.css">
   <script>
        function confirmDelete(form) {
            if (confirm("Are you sure you want to delete this car?")) {
                form.submit();
            }
        }
    </script>

</head>
<body class ="view">
    
<?php
require_once "connection.php";
   //$sql = "SELECT id,car_name,year,fuel_type,transmision,capacity,cylinder,body_type,price,image_path FROM car_table";
   $sql = "SELECT * FROM car_table";
$result = $con->query($sql);
?>

 <div class="table-div">
     <a href="admin.php" class="back-arrow">&#8592;</a>

<table border="1" class="table">
    <tr>
        <th>Car Name</th>
        <th>Model</th>
        <th>Fuel Type</th>
        <th>Transmission</th>
        <th>Capacity</th>
         <th>Cylinder</th>
          <th>Body Type</th>
           <th>Price</th>
            <th>Image</th>

    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["car_name"] . "</td>";
            echo "<td>" . $row["year"] . "</td>";
            echo "<td>" . $row["fuel_type"] . "</td>";
            echo "<td>" . $row["transmision"] . "</td>";
            echo "<td>" . $row["capacity"] . "</td>";
            echo "<td>" . $row["cylinder"] . "</td>";
            echo "<td>" . $row["body_type"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "<td>" . $row["image_path"] . "</td>";
           echo "<td>
              <form method='post' action='delete.php' style='display:inline;' onsubmit='event.preventDefault(); confirmDelete(this);'>
                  <input type='hidden' name='id' value='" . $row["id"] . "'>
                  <input type='submit' value='Delete'>
              </form>
              </td>";
            echo "<td> <form method='post' action='update.php' style='display:inline;'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <input type='submit' value='Update'>
                    </form></td>";
    

        }
    } else {
        echo "<tr><td colspan='4'>No cars found</td></tr>";
    } 
    ?>
    </table>
 </div>
</body>
</html>