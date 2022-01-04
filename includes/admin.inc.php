<?php
//session_start();
//echo "inc\n";
//echo $_SESSION["admin_id"];
global $admin;

if (isset($_SESSION["admin_id"])) {

    include(dirname(__FILE__) . '/../classes/Models/Dbh.php');
    include(dirname(__FILE__) . '/../classes/Models/Admin.php');
    include(dirname(__FILE__) . '/../classes/Controllers/AdminController.php');

    $id = $_SESSION["admin_id"];
    $controller = new AdminController();
    $admin = $controller->getAdmin($id);
    $reservationCount = $controller->getReservationCount();
    $customerCount = $controller->getCustomerCount();
    $CarsCount = $controller->getCarsCount();
    $revenue = $controller->getRentRevenue();

    //echo $admin->getAdminname();

    //$admin = $_GET[$id];

    // echo $admin->ssn;

}
