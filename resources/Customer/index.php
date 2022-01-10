<?php
session_start();
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

$sql = "select * from car natural join specs where status LIKE 'Active'";
$result = mysqli_query($conn, $sql);
$cars = mysqli_fetch_all($result, MYSQLI_ASSOC);


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home - customer</title>
    <script type="text/javascript" src="customer.js"></script>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="Author" name="WebThemez">
    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="customer.css">



</head>

<header>
    <?php


    if (!isset($_SESSION["cust_id"])) {
        //UNAUTHORIZED USER
        header("Location: ../../index.php?error=unAuth");
        session_destroy();
    }
    ?>
</header>

<body>

<div class="topnav">
        <a class="active" href="#services">Home</a>
        <a href="../../includes/logout.inc.php">Log out</a>
    </div>


    <div class="heading">
        <h1>Welcome, <?php echo $_SESSION['cust_name']; ?></h1>
        <h2>Choose the car that suits you best</h2>
    </div>

    <form action="search.php" method="post" onsubmit="return validateSearch()">
        <table class="table">
            <tbody>
                <tr>
                    <td><label for="plate_id">plate id</label>
                        <input type="text" placeholder="plate id" id="plate_id" name="plate_id">
                    </td>
                    <td><label for="model">model</label>
                        <input type="text" placeholder="model" id="model" name="model">
                    </td>
                    <td><label for="price">price</label>
                        <input type="text" placeholder="price" id="price" name="price">
                    </td>
                    <td><label for="year">year</label>
                        <input type="text" placeholder="year" id="year" name="year">
                    </td>
                </tr>
                <tr>
                    <td><label for="transmission">transmission</label>
                        <input type="text" placeholder="transmission" id="transmission" name="transmission">
                    </td>
                    <td><label for="body style">body style</label>
                        <input type="text" placeholder="body style" id="body_style" name="body_style">
                    </td>
                    <td><label for="seats count">seats count</label>
                        <input type="text" placeholder="seats count" id="seats_count" name="seats_count">
                    </td>
                    <td><label for="engine capacity">engine capacity</label>
                        <input type="text" placeholder="engine_capacity" id="engine_capacity" name="engine_capacity">
                    </td>
                    <td><label for="res_date">reservation date</label>
                        <input type="date" placeholder="res_date" id="res_date" name="res_date">
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="submit"><i class="fa fa-search"></i></button>


        <input type="reset" value="Reset" style="background-color: green; 
                        color: white" />

    </form>



    <section id="services">
        <div class="container">
            <div class="row">

                <?php foreach ($cars as $car) { ?>

                    <div class="col-lg-4">
                        <div class="card z-depth-0">
                            <div class="card-content center">
                                <a href="<?php echo $car['image_link']; ?>"><img src="<?php echo $car['image_link']; ?>" style="height: 180px; width: 280px;" class="img-responsive" alt="image">
                                </a>
                                <ul style=" width: 280px;">
                                    <li><i class="fa fa-tag" aria-hidden="true"></i> # <?php echo $car['plate_id']; ?></li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i> <?php echo $car['engine_capacity']; ?> cc</li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $car['year']; ?> Model</li>
                                    <li><i class="fa fa-user" aria-hidden="true"></i> <?php echo $car['seats_count']; ?> seats</li>
                                    <li><i class="fa fa-cog" aria-hidden="true"></i> <?php echo $car['transmission']; ?></li>
                                </ul>
                                <div class="car-title-m">
                                    <h6><a href="car_details.php?vhid=2"> <?php echo $car['model'] ?></a></h6>
                                    <span class="price"><?php echo $car['price']; ?> EGP / Day</span>
                                </div>

                                <div class="inventory_info_m ">
                                    <p>Available in <?php echo $car['location']; ?></p>
                                </div>
                            </div>

                            <div class="card-action">
                                <div class="col-sm-12 text-center">
                                    <form action="reserved.php" method="GET">
                                        <input type="hidden" id="plate_id" name="plate_id" value="<?php echo $car['plate_id'] ?>"></input>
                                        <button type="submit" id="reserve" class="btn btn-primary btn-md center-block" Style="width: 200px;">Reserve and pay later</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <script>
        function validateSearch() {
            plate_id = document.getElementById("plate_id").value;
            model = document.getElementById("model").value;
            price = document.getElementById("price").value;
            year = document.getElementById("year").value;
            transmission = document.getElementById("transmission").value;
            body_style = document.getElementById("body_style").value;
            seats_count = document.getElementById("seats_count").value;
            engine_capacity = document.getElementById("engine_capacity").value;
            res_date = document.getElementById("res_date").value;

            if (plate_id == '' && model == '' && price == '' && year == '' && transmission == '' && body_style == '' && seats_count == '' && engine_capacity == '' && !Date.parse(res_date)) {
                alert('Search bars empty. Please type in any value.');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>