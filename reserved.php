<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_rental_system";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<head>
    <title>Successful Reservation</title>
</head>
<body>
    <h1 style="text-align: center">Thank you, you have successfully reserved this car.</h1>
</body>

