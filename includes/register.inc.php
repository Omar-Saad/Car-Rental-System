<?php

if (isset($_POST["submit"])) {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    include '../classes/Models/Dbh.php';
    include '../classes/Models/Register.php';
    include '../classes/Controllers/RegisterController.php';

    $register = new RegisterController($email, $username, $password);
    $register->register();

    header("Location: ../index.php?error=none");
}