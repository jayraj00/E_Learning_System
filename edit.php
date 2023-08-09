<?php
// Database connection details
require './conn.php';


// Check if the email parameter is provided
if (isset($_GET['email'])) {
    // Get the email from the URL parameter
    $email = $_GET['email'];

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        // Get the updated values from the form
        $fname = $_POST['fname'];
        $cno = $_POST['cno'];
        $pass = $_POST['pass'];
        $rle = $_POST['rle'];

        // Prepare the update query
        $updateQuery = "UPDATE users SET fname = '$fname', cno = '$cno', pass = '$pass', rle = '$rle' WHERE email = '$email'";

        // Execute the update query
        mysqli_query($conn, $updateQuery);

        // Check if the record was updated
        if (mysqli_affected_rows($conn) > 0) {
            header("Location: hell.php");
        } else {
            header("Location: error.html");

        }
    }

    // Fetch the existing data for the email
    $selectQuery = "SELECT fname, cno, pass, rle FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $selectQuery);
    $row = mysqli_fetch_assoc($result);

    // Close the result set
    mysqli_free_result($result);
} else {
    echo "Email parameter is missing.";
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .update-form {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }

        .update-form label {
            display: block;
            margin-bottom: 10px;
        }

        .update-form input[type="text"],
        .update-form input[type="password"],
        .update-form select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }

        .update-form button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .update-form button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="update-form">
        <h2>Update User</h2>
        <form method="POST" action="">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" value="<?php echo $row['fname']; ?>" required>

            <label for="cno">Contact Number</label>
            <input type="text" id="cno" name="cno" value="<?php echo $row['cno']; ?>" required>

            <label for="pass">Password</label>
            <input type="password" id="pass" name="pass" value="<?php echo $row['pass']; ?>" required>

            <label for="rle">rle</label>
            <select id="rle" name="rle" required>
                <option value="job" <?php if ($row['rle'] === 'job')
                    echo 'selected'; ?>>Job</option>
                <option value="student" <?php if ($row['rle'] === 'student')
                    echo 'selected'; ?>>Student</option>
            </select>

            <button type="submit" name="submit">Update</button>
        </form>
    </div>
</body>

</html>