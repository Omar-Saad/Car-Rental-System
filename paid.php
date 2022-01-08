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
    <title>Successful Payment</title>
</head>
<body>
    <h1 style="text-align: center">Thank you, you have successfully completed payment.</h1>
</body>
