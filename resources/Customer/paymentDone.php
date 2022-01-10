<?php
session_start();

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
    
    <h2 style="text-align: center;">Payment is Done Successfully</h2>
    <br />
      
        <h4>Thank You  <?php echo $_SESSION['cust_name']; ?></h4>
    
        <a style="float: right; background-color: teal;" class="btn btn-primary" href="index.php" role="button">Back To Home</a>


    </div>

    <script src="../js/customer.js"></script>


</body>



</html>