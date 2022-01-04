<?php
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Car</title>
    <link rel="stylesheet" href="../css/login_style.css">
</head>
<header>
    <?php
    if (!isset($_SESSION["admin_id"])) {
        //UNAUTHORIZED USER
        header("Location: ../");
    }
    ?>
</header>
