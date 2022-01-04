<?php

// TODO: CAR MODEL 
class Car extends Dbh
{

    private function carExist($plateId)
    {
        $query = "SELECT *" . " FROM car WHERE plate_id = ?;";
        $stmt = $this->connect()->prepare($query);

        // Query Failed
        if (!$stmt->execute([$plateId])) {
            $stmt = NULL;
            header("Location: ../../index.php?error=stmtFailed");
            exit();
        }
        // Doesn't Exist
        if ($stmt->rowCount() == 0) {
            $stmt = NULL;
            //header("Location: ../../index.php?error=wrongUsernameOrPassword");
            return False;
        }
        return $stmt->fetchAll();
    }

    protected function insertCar($plateId, $model, $price, $year, $status, $car_image, $location)
    {
        if (!$this->carExist($plateId)) {
            $query = "INSERT INTO" . " car (plate_id, status, model , year,price,image_link , location)
                    VALUES (?, ?, ?,?, ?, ?,?);";
            $stmt = $this->connect()->prepare($query);

            if (!$stmt->execute(array($plateId, $model, $price, $year, $status, $car_image, $location))) {
                $stmt = NULL;
                header("Location: ../resources/Admin/addCar.php?error=stmtFailed");
                exit();
            }
            $stmt = NULL;

        } else {

            header("Location: ../resources/Admin/addCar.php?error=carAlreadyExist");
            exit();
        }
    }

    protected function getCar($plateId)
    {
        $userExist = $this->carExist($plateId);
        if ($userExist === False) {
            header("Location: ../resources/Admin/addCar.php?error=carAlreadyExists");
            exit();
        }

        // Starting Session
        //    // $_SESSION["id"] = $userExist[0]["cust_id"];
        //     $_SESSION["email"] = $userExist[0]["email"];
        //     if($isAdmin){
        //         $_SESSION["admin_id"] = $userExist[0]["admin_id"];
        // echo  $_SESSION["admin_id"];
        header("Location: ../resources/Admin/car.php");

        // TODO :: Location Header
        //header("Location: ");

        exit();
    }

    protected function insertSpec($plate_id, $transmission, $body_style, $ac, $seats_count, $engine_capacity, $fuel_consumption, $air_bags_count)
    {
        $query = "INSERT INTO" . " specs (plate_id, transmission, body_style, AC, seats_count, engine_capacity, fuel_consumption, air_bags_count)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($query);
        if (!$stmt->execute(array($plate_id, $transmission, $body_style, $ac, $seats_count, $engine_capacity, $fuel_consumption, $air_bags_count))) {
            header("Location: ../resources/Admin/addSpecs.php?error=stmtFailed");
        } else {
            header("Location: ../resources/Admin/viewAllCars.php?error=none");
        }
        $stmt = NULL;
        exit();
    }
}
