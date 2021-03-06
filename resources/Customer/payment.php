<?php

include '../../includes/Customer/payment.inc.php';

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

</header>
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
    <!-- <div class="error_res" id="error_res"><?php echo $error;?></div> -->
    <h2 style="text-align: center;"><?php echo $car['model']; ?></h2>
    <br />
        <img src="<?php echo $image_link; ?>" class="img-fluid" alt="Responsive image">
        <br />
        <br />
        <h4>Reservation Number : <?php echo $res_id; ?></h4>
    
       
        <h4>Day Price : <?php echo $price; ?> EGP / Day</h4>
        <h4>Reservation From : <?php echo $res_date; echo "  TO ".$ret_date; ?></h4>
        <h4>Number Of Days : <?php echo $rent_days; ?> Days</h4>
        <h4>Total Price : <?php echo $total_amount; ?> EGP</h4>
        <form action="../../includes/Customer/payment.inc.php" method="POST">
            
            <input type="hidden" id="res_id" name="res_id" value="<?php echo $res_id; ?>"></input>
            <input type="hidden" id="total_amount" name="total_amount" value="<?php echo $total_amount; ?>"></input>
            <button style=" float:right;" id="submit_pay"name="submit_pay" type="submit" class="btn btn-danger">PAY NOW</button>

        </form>

    </div>

    <script src="../js/customer.js"></script>


</body>



</html>