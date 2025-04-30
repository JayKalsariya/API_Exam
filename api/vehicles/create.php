<?php
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include('../../config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        http_response_code(201);
        $plate_number = $_POST['plate_number'];
        $owner_name = $_POST['owner_name'];
        $vehicle_type = $_POST['vehicle_type'];

        $res = $config->insertVehicle($plate_number, $owner_name, $vehicle_type);

        if($res){
            $arr['msg'] = "Data Inserted...";
        }else{
            $arr['msg'] = "Data not Inserted...";
        }
    }else{
        $arr['Error'] = "Only Access POST HTTP request type";
    }

    echo json_encode($arr);

?>
