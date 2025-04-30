<?php
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json");

    include('../../config/config.php');

    $config = new Config();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        http_response_code(201);

        $slot_number = $_POST['slot_number'];
        $status = $_POST['status'];
        $vehicle_id = isset($_POST['vehicle_id']) ? $_POST['vehicle_id'] : null;

        $res = $config->insertParkingSlot($slot_number, $status, $vehicle_id);

        if ($res) {
            $arr['msg'] = "Parking slot inserted successfully.";
        } else {
            $arr['msg'] = "Failed to insert parking slot.";
        }
    } else {
        $arr['error'] = "Only POST method is allowed.";
    }

    echo json_encode($arr);
?>
