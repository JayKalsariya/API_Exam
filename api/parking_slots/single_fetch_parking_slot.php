<?php
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include('../../config/config.php');

    $config = new Config();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];

        $result = $config->getParkingSlotById($id);

        if ($result) {
            $arr['data'] = $result;
        } else {
            $arr['error'] = "Parking slot not found.";
        }
    } else {
        $arr['error'] = "Only POST method is allowed.";
    }

    echo json_encode($arr);
?>
