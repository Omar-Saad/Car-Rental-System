<?php

if (isset($_POST["submit"])) {

    $email = $_POST['email'];
//    $username = $_POST['username'];
    $password = $_POST['password'];

    include '../classes/Models/Dbh.php';
    include '../classes/Models/Login.php';
    include '../classes/Controllers/LoginController.php';

    $login = new loginController($email, $password);
    $login->login();

    header("Location: ../Login/index.php?error=none");
}