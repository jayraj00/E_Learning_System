<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <form action="./login.php" method="POST">
            <div class="title">Student Login</div>
            <div class="input-box underline">
                <input type="text" placeholder="Enter Your Email" name="email" id="email" autocomplete="off" required>
                <div class="underline"></div>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Enter Your Password" name="pass" id="password" autocomplete="off"
                    required>
                <div class="underline"></div>
            </div>
            <div class="input-box button">
                <input type="submit" name="sbmt" value="Continue">
            </div>
            <div class="option">or Connect With Social Media</div>
            <div class="twitter">
                <a href="#"><i class="fab fa-twitter"></i>Sign in With Twitter</a>
            </div>
            <div class="facebook">
                <a href="#"><i class="fab fa-facebook-f"></i>Sign in With Facebook</a>

            </div>
            <p><a href="signup.php">Sign up</a> if you did not have account</p>
    </div>
    </form>
    <div class="my button">
        <a href="admin.html"><button> Admin Login </button></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="teacher.html"><button> Teachers Login </button></a>
    </div>

</body>
<?php
require './conn.php'; 



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // header("Location: hell.php");
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  // Sanitize email input
  // $email = mysqli_real_escape_string($conn, $email);
  $email = mysqli_real_escape_string($conn, $email);
  $pass = mysqli_real_escape_string($conn, $pass);
  // Query to fetch user from database
  $query = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);
    if ($pass === $user['pass']) {
      // User credentials are valid
      // Redirect to the success page
      header("Location: student.html");
      exit();
    }
  }

  $error_message = "Invalid email or password";
}
$error_message = "Invalid email or password";


?>

</html>

<!-- <script src="E:/DE E-learing/code/education-website/js/EducationWebsite.js"></script> -->