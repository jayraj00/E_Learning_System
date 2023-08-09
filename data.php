<?php
// Database connection details
require './conn.php';
// Check connection

// Check if the email parameter is provided
if (isset($_GET['email'])) {
    // Get the email from the URL parameter
    $email = $_GET['email'];

    // Prepare the delete query
    $deleteQuery = "DELETE FROM users WHERE email = '$email'";

    // Execute the delete query
    mysqli_query($conn, $deleteQuery);

    // Check if the record was deleted
    if (mysqli_affected_rows($conn) > 0) {
        header("Location: hell.php");
    } else {
        header("Location: error.html");
    }
} else {
    header("Location: error.html");
}

// Close the database connection
mysqli_close($conn);
?>