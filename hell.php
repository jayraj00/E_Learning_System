<?php
// Database connection details
require './conn.php';

// Fetch data from the database
$query = "SELECT fname, email, cno, pass, rle FROM users";
$result = mysqli_query($conn, $query);

// Delete data from the database
if (isset($_GET['delete'])) {
    $email = $_GET['delete'];
    $deleteQuery = "DELETE FROM users WHERE email = '$email'";
    mysqli_query($conn, $deleteQuery);
    header("Location: data.php");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Data</title>
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

    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 800px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    table th,
    table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f5f5f5;
    }

    table tr:hover {
        background-color: #f9f9f9;
    }

    .action-buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .action-buttons a {
        padding: 6px 10px;
        background-color: #4CAF50;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .action-buttons a:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>First Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Password</th>
            <th>rle</th>
            <th>Actions</th>
        </tr>
        <?php
        // Loop through the result and display data in table rows
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['fname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['cno'] . "</td>";
            echo "<td>" . $row['pass'] . "</td>";
            echo "<td>" . $row['rle'] . "</td>";
            echo "<td class='action-buttons'>";
            echo "<a href='edit.php?email=" . $row['email'] . "'>Update</a>";
            echo "<a href='data.php?email=" . $row['email'] . "'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>