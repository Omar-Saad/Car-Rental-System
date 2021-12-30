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
    <link rel="stylesheet" href="../css/login_style.css">
</head>
<header>
    <?php
    if (isset($_SESSION['username'])) {
        echo '<a class="nav-link" href="includes/logout.inc.php">Logout</a>';
    } else {
        echo '<a class="nav-link" href="register.php">Register</a>';
        echo '<a class="nav-link" href="index.php">Login</a>';
    }
    ?>
</header>

<body>