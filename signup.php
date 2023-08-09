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
    <form action="./signup.php" method="POST">
      <div class="title">Student Sign up</div>
      <div class="input-box underline">
        <input type="text" placeholder="Enter Your Full Name" name="fname" required>
        <div class="underline"></div>
      </div>
      <div class="input-box underline">
        <input type="text" placeholder="Enter Your Email" name="email" id="email" required>
        <div class="underline"></div>
      </div>
      <div class="input-box underline">
        <input type="text" placeholder="Enter Your Phone no." name="cno" id="number" required>
        <div class="underline"></div>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Enter Your Password" name="pass" id="password" required>
        <div class="underline"></div>
      </div> <br> <br>
      <div>
        <input type="radio" id="dewey" name="rle" value="job">
        <label for="dewey">Job</label>
        <input type="radio" id="dewey" name="rle" value="student">
        <label for="dewey">Student</label>
      </div>
      <div class="input-box button">
        <input type="submit" name="sbmt" value="Continue" onclick="auth()">
      </div>
      <p><a href="login.php">Login</a> if you have account</p>
  </div>
  </form>

</body>

<?php
require './conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $fname = $_POST['fname'];
  $email = $_POST['email'];
  $cno = $_POST['cno'];
  $pass = $_POST['pass'];
  $rle = $_POST['rle'];

  // Escape special characters to prevent SQL injection
  $fname = mysqli_real_escape_string($conn, $fname);
  $email = mysqli_real_escape_string($conn, $email);
  $cno = mysqli_real_escape_string($conn, $cno);
  $pass = mysqli_real_escape_string($conn, $pass);
  $rle = mysqli_real_escape_string($conn, $rle);

  // Insert query
  $sql = "INSERT INTO users (fname, email, cno, pass, rle) VALUES ('$fname', '$email', '$cno', '$pass', '$rle')";

  if (mysqli_query($conn, $sql)) {
    header("Location: login.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>


</html>

<!-- <script src="E:/DE E-learing/code/education-website/js/EducationWebsite.js"></script> -->