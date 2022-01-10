<?php
    include '../../includes/Customer/reserved.inc.php';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="reservation.css">
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
    <div class="out_div">
    <div class="error_res" id="error_res"><?php echo $error;?></div>
    <h2 style="text-align: center;"><?php echo $car['model']; ?></h2>
    <br />
        <img  src="<?php echo $car['image_link']; ?>" class="img-fluid" alt="Responsive image">
        <br />
        <br />
        <h4>Car Specs</h4>
    
        <ul style=" width: 280px;">
            <li><i class="fa fa-tag" aria-hidden="true"></i> Plate ID : <?php echo $specs['plate_id']; ?></li>
            <li><i class="fa fa-car" aria-hidden="true"></i> Engine Capacity : <?php echo $specs['engine_capacity']; ?> cc</li>
            <li><i class="fa fa-calendar" aria-hidden="true"></i> Year : <?php echo $car['year']; ?> Model</li>
            <li><i class="fa fa-user" aria-hidden="true"></i> Number Of Seats : <?php echo $specs['seats_count']; ?> seats</li>
            <li><i class="fa fa-car" aria-hidden="true"></i> Body Style : <?php echo $specs['body_style']; ?></li>
            <li><i class="fa fa-cog" aria-hidden="true"></i> Transmission : <?php echo $specs['transmission']; ?></li>
            <li><i class="fas fa-car-crash" aria-hidden="true"></i> Number Of Airbags : <?php echo $specs['air_bags_count']; ?></li>
            <li><i class="fas fa-gas-pump" aria-hidden="true"></i> Fuel Consumption : <?php echo $specs['fuel_consumption']; ?></li>
            <?php
            if ($specs['AC'] == 1)
                echo '<li><i class="fas fa-fan" aria-hidden="true"></i> AC</li>'
            ?>
            <li><i class="fa fa-map" aria-hidden="true"></i> Location : <?php echo $car['location']; ?></li>
        </ul>
        <h4>Price : <?php echo $car['price']; ?> EGP / Day</h4>
        <form action="../../includes/Customer/reserved.inc.php" method="POST" onsubmit="return validateDate()">
            <label for="res_date">Reserve Date</label>
            <input type="hidden" id="plate_id" name="plate_id" value="<?php echo $car['plate_id']; ?>"></input>
            <input type="hidden" id="price" name="price" value="<?php echo $car['price']; ?>"></input>

            <input type="hidden" id="cust_id" name="cust_id" value="<?php echo $_SESSION['cust_id']; ?>"></input>
            <input type="hidden" id="location" name="location" value="<?php echo $car['location']; ?>"></input>

            <input type="date" id="res_date" name="res_date" ></input>
            <br />
            <label for="ret_date">Return Date</label>
            <input type="date" id="ret_date" name="ret_date"></input>
            <br />
            <button style="background-color: teal; float:right;" id="submit"name="submit" type="submit" class="btn btn-success">RESERVE NOW</button>

        </form>

    </div>

    <script src="../js/customer.js"></script>


</body>



</html>