<?php

if(isset($_GET['submit'])){

    $res_date =$_GET['res_date'];
    $ret_date =$_GET['ret_date'];
    $plate_id =$_GET['plate_id'];
    $price =$_GET['price'];

    $d1 = strtotime($res_date);
    $d2 = strtotime($ret_date);
    $datediff = $d2 - $d1;
    $rent_days = round($datediff / (60 * 60 * 24));

    if($rent_days==0)
        $rent_days = 1;
    $total_amount = $price * $rent_days;

}

?>