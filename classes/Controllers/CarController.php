<?php


class CarController extends Car
{
    private $plateId;
    private $model ;
    private $price;
    private $year;
    private $status ; 
    private $car_image;
    private $location;

    public function __construct($plateId,$model , $price,  $year, $status , $car_image,$location)
    {
        $this->plateId = $plateId;
        $this->model = $model;
        $this->price = $price;

        
        $this->year = $year;
        $this->status = $status;
        $this->car_image = $car_image;
        $this->location = $location;

    }

    public function addCar()
    {
        $this->insertCar($this->plateId,$this->model , $this->price,  $this->year, $this->status , $this->car_image,$this->location);
    }
}