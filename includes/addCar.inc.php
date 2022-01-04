
<?php

if (isset($_POST["submit"])) {

    //$email = $_POST['email'];
//    $username = $_POST['username'];
   // $password = $_POST['password'];
    
 //  if(isset($_POST["status"]))
   //     echo $_POST['status'];

   $plateId =$_POST["plate_id"] ;
   $_SESSION['plate_id']  = $plateId;
   $model = $_POST["model"] ;
   $price = $_POST["price"];
   $year = $_POST["year"];
   
   $car_image = $_POST["car_image"];
   $location =  $_POST["location"];

   if(isset($_POST["status"] ) )
   $status = $_POST["status"] ; 
   else
   $status =0 ; 

   include '../classes/Models/Dbh.php';
    include '../classes/Models/Car.php';
    include '../classes/Controllers/CarController.php';

    

    $car = new CarController($plateId,$model , $price,  $year, $status , $car_image,$location);
    $car->addCar();

    header("Location: ../resources/Admin/addSpecs.php");

}
?>