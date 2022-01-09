<?php
session_start();

if (!isset($_SESSION["admin_id"])) {
    //UNAUTHORIZED USER
    header("Location: ../Login?error=unAuth");
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../css/admin_style.css">
</head>

<body>
