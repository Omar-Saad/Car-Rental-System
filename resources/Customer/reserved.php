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

session_start();

if(isset($_GET['plate_id']))
{
$sql = "select * from car where plate_id =".$_GET['plate_id'];
$result = mysqli_query($conn, $sql);

$car = mysqli_fetch_all($result, MYSQLI_ASSOC);
$car = $car[0];

$sql = "select * from specs where plate_id =".$_GET['plate_id'];
$result = mysqli_query($conn, $sql);

$specs = mysqli_fetch_all($result, MYSQLI_ASSOC);
$specs = $specs[0];


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="reservation.css">
</head>
<header>
 
</header>

<body>
    <div class="out_div">
    <img src="<?php echo $car['image_link'];?>" class="img-fluid" alt="Responsive image">
    <br/>
    <h2 ><?php echo $car['model'];?></h2>
    <ul style=" width: 280px;">
       <li><i class="fa fa-tag" aria-hidden="true"></i> Plate ID : <?php echo $specs['plate_id']; ?></li>
        <li ><i class="fa fa-car" aria-hidden="true"></i> Engine Capacity : <?php echo $specs['engine_capacity']; ?> cc</li>
        <li><i class="fa fa-calendar" aria-hidden="true"></i> Year : <?php echo $car['year']; ?> Model</li>
        <li><i class="fa fa-user" aria-hidden="true"></i> Number Of Seats : <?php echo $specs['seats_count']; ?> seats</li>
        <li><i class="fa fa-car" aria-hidden="true"></i> Number Of Seats : <?php echo $specs['body_style']; ?> seats</li>
        <li><i class="fa fa-cog" aria-hidden="true"></i> Transmission : <?php echo $specs['transmission']; ?></li>
        <li><i class="fa fa-map" aria-hidden="true"></i> Location : <?php echo $car['location']; ?></li>    
    </ul>

    </div>

    </body>
  
</html>