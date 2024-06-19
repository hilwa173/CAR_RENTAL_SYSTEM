<?php
session_start();
include("connection.php");
$username = "";
$password = "";
$err = "";
 if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST["username"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    $sql = "SELECT * FROM admn_table WHERE username = '$username' AND password = '$password' LIMIT 1";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['username'] = $username;
    } else {
        $err = "Username or password error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
     <link rel="stylesheet"  href="add_new_car.css">
 
</head>
<body> 
    <?php if (!isset($_SESSION['admin_logged_in'])): ?>
        <div class="box">
            <h1>Login as admin</h1>
            <div class="err">
                <?php echo $err; ?>
            </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="text" name="username" placeholder="Enter username" required>
                <input type="password" name="password" placeholder="Enter password" required>
                <section class="lsbutton">
                    <input type="submit" value="Login" name="login">
                    <input type="reset" name="reset">
                </section>
            </form>
        </div>
    <?php else: ?>
        <div class="butons">
            <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
            <div><a id="addcar" class="admn" href="add_new_car.php">Add New Car</a></div>
            <div><a id="viewcarBtn" class="admn" href="viewcarlist.php">View Cars</a></div>
            <div> <a class="admn" href="viewcustomer.php">View Customer</a></div>
            <div><a id="try" class="admn" href="approve.php">View Rent</a></div> 
               <div><a  class="admn" href="index.php">Goto Page</a></div> 
            <div><a id="logoutBtn" class="admn" href="admnlogout.php">Logout</a></div>
           
        </div>
    <?php endif; ?>
    <script src=" "></script>
</body>
</html>
