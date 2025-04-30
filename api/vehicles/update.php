<?php

    header("Access-Control-Allow-Methods: PUT, PATCH");
    header("Content-Type: application/json");

    include('../../config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD']=='PUT' || $_SERVER['REQUEST_METHOD']=='PATCH'){

        $input = file_get_contents('php://input');

        parse_str($input, $_UPDATE);

        $id = $_UPDATE['id'];
        $plate_number = $_UPDATE['plate_number'];
        $owner_name = $_UPDATE['owner_name'];
        $vehicle_type = $_UPDATE['vehicle_type'];

        $res = $config->updateVehicle($id, $plate_number, $owner_name, $vehicle_type);

        if($res){
            $arr['data'] = "Data Updated...";
        }else{
            $arr['data'] = "Data Updated...";
        }

    }else{
        $arr['error'] = "Only Access PUT & PATCH HTTP request type";
    }

    echo json_encode($arr);

?>