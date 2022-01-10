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
//if (!empty($_POST['res_date'])){
//    $date = $_POST['res_date'];
//    $where[] = 'res';
//    $query ="SELECT * ".
//            "FROM car WHERE NOT EXISTS (
//            SELECT plate_id FROM reservation where ".$date." BETWEEN res_date AND return_date );";
//}
if (count($where)) {
    $query = 'SELECT * FROM car NATURAL JOIN specs WHERE ' . implode(' AND ', $where);
    $result = $conn->query($query);
}


if ($result) { ?>

    <head>
        <title>Search results</title>
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
                                        <h3> <?php echo $row['model'] ?></h3>
                                        <span class="price"><?php echo $row['price']; ?> EGP</span>
                                    </div>

                                    <div class="inventory_info_m ">
                                        <p>Available in <?php echo $row['location']; ?></p>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <div class="col-sm-12 text-center">
                                        <form action="reserved.php" method="GET">
                                            <input type="hidden" id="plate_id" name="plate_id" value="<?php echo $car['plate_id'] ?>"></input>
                                            <button type="submit" id="reserve" class="btn btn-primary btn-md center-block" Style="width: 200px;">I want To Reserve</button>
                                        </form>
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