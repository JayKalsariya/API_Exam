<?php

    header("Access-Control-Allow-Methods: PUT, PATCH");
    header("Content-Type: application/json");

    include('../../config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id = $_POST['id'];

        $result = $config->getVehicleById($id);

        if($result){
            $arr['data'] = $result;
        }else{
            $arr['error'] = "Not Found";
        }
    }else{
        $arr['error'] = "Only Access POST HTTP request type";
    }

    echo json_encode($arr);

?>