<?php
include 'connection.php';
session_start();

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $password = mysqli_real_escape_string($con, md5($_POST['password'])); 

   $select_users = mysqli_query($con, "SELECT * FROM customer_table WHERE email = '$email' AND passwords = '$password'") or die('Query failed: ' . mysqli_error($con));

   if(mysqli_num_rows($select_users) > 0){
      $row = mysqli_fetch_assoc($select_users);
      $_SESSION['user_name'] = $row['name'];
      $_SESSION['user_email'] = $row['email'];
      $_SESSION['user_id'] = $row['id'];
      header('location: account.php');
      exit;
   } else {
      $message = 'Incorrect email or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="login.css">
</head>
<body>
   <script>
      <?php
      if(isset($message)){
         echo "alert('$message');";
      }
      ?>
   </script>
   <div class="login-form-container" id="logintry">
      <svg id="close-login-form" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24">
         <path d="M 4.9902344 3.9902344 A 1.0001 1.0001 0 0 0 4.2929688 5.7070312 L 10.585938 12 L 4.2929688 18.292969 A 1.0001 1.0001 0 1 0 5.7070312 19.707031 L 12 13.414062 L 18.292969 19.707031 A 1.0001 1.0001 0 1 0 19.707031 18.292969 L 13.414062 12 L 19.707031 5.7070312 A 1.0001 1.0001 0 0 0 18.980469 3.9902344 A 1.0001 1.0001 0 0 0 18.292969 4.2929688 L 12 10.585938 L 5.7070312 4.2929688 A 1.0001 1.0001 0 0 0 4.9902344 3.9902344 z"></path>
      </svg>
      <form action="" method="post">
         <h3>User Login</h3>
         <input type="email" placeholder="Email" class="box" name="email" required>
         <input type="password" placeholder="Password" class="box" name="password" required>
         <p>Forget your password? <a href="#">Click here</a></p>
         <input type="submit" value="Login" class="btnLog" name="submit">
         <p>Don't have an account? <a href="signup.php" id="sign-btn" class="register-link">Create one</a></p>
      </form>
   </div>
   <script src="login.js"></script>
</body>
</html>
