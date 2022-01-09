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


$sql = "SELECT * FROM car natural join specs where status=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "plate id: " . $row["plate_id"] . " - Body Style: " . $row["body_style"] . " - Transmission: " . $row["transission"] . "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
