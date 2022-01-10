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

$where = array();

if (!empty($_POST["plate_id"])) {
    $plate_id = $_POST["plate_id"];
    $where[] = 'plate_id = ' . $plate_id . '';
}
if (!empty($_POST["model"])) {
    $model = $_POST["model"];
    $where[] = 'model = "' . $model . '"';
}
if (!empty($_POST["price"])) {
    $price = $_POST["price"];
    $where[] = 'price = ' . $price . '';
}
if (!empty($_POST["year"])) {
    $year = $_POST["year"];
    $where[] = 'year = ' . $year . '';
}
if (!empty($_POST['transmission'])) {
    $transmission = $_POST['transmission'];
    $where[] = 'transmission = "' . $transmission . '"';
}
if (!empty($_POST['body_style'])) {
    $body_style = $_POST['body_style'];
    $where[] = 'body_style = "' . $body_style . '"';
}
if (!empty($_POST['seats_count'])) {
    $seats_count = $_POST['seats_count'];
    $where[] = 'seats_count = ' . $seats_count . '';
}
if (!empty($_POST['engine_capacity'])) {
    $engine_capacity = $_POST['engine_capacity'];
    $where[] = 'engine_capacity = ' . $engine_capacity . '';
}


if (count($where)) {
    $query = 'SELECT * FROM car NATURAL JOIN specs WHERE ' . implode(' AND ', $where);
}


$result = $conn->query($query);

if ($result->num_rows > 0) { ?>

    <head>
        <title>Search results</title>
        <link rel="stylesheet" type="text/css" href="customer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <?php
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); ?>

    <body>
        <h1 style="text-align: center;">Search results:</h1>
        <?php
        foreach ($rows as $row) {
        ?>

            <section id="services">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card z-depth-0">
                                <div class="card-content center">
                                    <a href="<?php echo $row['image_link']; ?>"><img src="<?php echo $row['image_link']; ?>" style="height: 180px; width: 280px;" class="img-responsive" alt="image">
                                    </a>
                                    <ul style=" width: 280px;">
                                        <li><i class="fa fa-tag" aria-hidden="true"></i> <?php echo $row['plate_id']; ?></li>
                                        <li><i class="fa fa-car" aria-hidden="true"></i> <?php echo $row['engine_capacity']; ?> cc</li>
                                        <li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $row['year']; ?> Model</li>
                                        <li><i class="fa fa-user" aria-hidden="true"></i> <?php echo $row['seats_count']; ?> seats</li>
                                    </ul>
                                    <div class="car-title-m">
                                        <h6><a href="car_details.php?vhid=2"> <?php echo $row['model'] ?></a></h6>
                                        <span class="price"><?php echo $row['price']; ?> EGP</span>
                                    </div>
                                    <div class="inventory_info_m ">
                                        <p>Available in <?php echo $row['location']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </body>

<?php

        }
    } else {
        echo "Sorry, no cars with the given specs are available";
    }









    $conn->close();
?>