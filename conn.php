<?php
$servername = 'localhost'; // Replace 3306 with your actual port number
$username = 'root';
$dbname = 'ed_sys';

$conn = mysqli_connect($servername, $username, "", $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Hell. Connected"
    ?>