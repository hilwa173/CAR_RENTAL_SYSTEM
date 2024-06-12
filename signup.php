<?php

include 'connection.php';
if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);
    $cpass = mysqli_real_escape_string($con, $_POST['cpassword']);
    $check_email = mysqli_query($con, "SELECT * FROM customer_table WHERE email = '$email'");
    if(mysqli_num_rows($check_email) > 0) {
        $message[] = 'Email already exists!';
    } else {
        $check_username = mysqli_query($con, "SELECT * FROM customer_table WHERE username = '$username'");
        if(mysqli_num_rows($check_username) > 0) {
            $message[] = 'Username already exists!';
        } else {
            if($pass != $cpass) {
                $message[] = 'Confirm password does not match!';
            } elseif(strlen($pass) < 6) {
                $message[] = 'Password must be at least 6 characters!';
            } else {
                $hashed_pass = md5($pass);
                mysqli_query($con, "INSERT INTO customer_table (names, username, email, passwords) VALUES ('$name', '$username', '$email', '$hashed_pass')") or die('Query failed: ' . mysqli_error($con));
                $message[] = 'Registered successfully!';
                // header('Location: login.php');
                // exit(); // Ensure no further code is executed after the redirect
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
     <link rel="stylesheet" href="signup.css">
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   
</head>
<body>
    <script>
        // Example usage: Replace PHP messages with JavaScript alerts
        <?php
        if(isset($message)){
            foreach($message as $msg){
                echo "alert('$msg');";
            }
        }
        ?>
    </script>
    <div class="signup-form">
        <div>
            <svg id="close-sign-form" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24">
                <path d="M 4.9902344 3.9902344 A 1.0001 1.0001 0 0 0 4.2929688 5.7070312 L 10.585938 12 L 4.2929688 18.292969 A 1.0001 1.0001 0 1 0 5.7070312 19.707031 L 12 13.414062 L 18.292969 19.707031 A 1.0001 1.0001 0 1 0 19.707031 18.292969 L 13.414062 12 L 19.707031 5.7070312 A 1.0001 1.0001 0 0 0 18.980469 3.9902344 A 1.0001 1.0001 0 0 0 18.292969 4.2929688 L 12 10.585938 L 5.7070312 4.2929688 A 1.0001 1.0001 0 0 0 4.9902344 3.9902344 z"></path>
            </svg>
        </div>
        <div>
            <form action="signup.php" name="signup-form" method="post">
                <h2>Sign Up</h2>
                <div>
                   
                    <input type="text" id="name" name="name" class="box" placeholder="Enter your full name" required>
                </div>
                <div>
                    
                    <input type="text" id="username" name="username" class="box" placeholder="Enter your username" required>
                </div>
                <div>
                    
                    <input type="email" id="email" name="email" placeholder="Enter your email" class="box" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                </div>
                <div>
                    
                    <input type="password" id="password" name="password" class="box" placeholder="Enter a password" required>
                </div>
                <div>
                   
                    <input type="password" id="confirm-password" name="cpassword" class="box" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btnLog" name="submit">Sign Up</button>
                <p>Already have an account? <a href="login.php" class="login-link" id="lgn-btn">Login</a></p>
            </form>
        </div>
    </div>
    <script src="signup.js"></script>
</body>
</html>