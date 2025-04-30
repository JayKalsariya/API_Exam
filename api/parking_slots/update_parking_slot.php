<?php
    header("Access-Control-Allow-Methods: PUT, PATCH");
    header("Content-Type: application/json");

    include('../../config/config.php');

    $config = new Config();

    if ($_SERVER['REQUEST_METHOD'] == 'PUT' || $_SERVER['REQUEST_METHOD'] == 'PATCH') {
        $input = file_get_contents('php://input');
        parse_str($input, $_UPDATE);

        $id = $_UPDATE['id'];
        $slot_number = $_UPDATE['slot_number'];
        $status = $_UPDATE['status'];
        $vehicle_id = isset($_UPDATE['vehicle_id']) ? $_UPDATE['vehicle_id'] : null;

        $res = $config->updateParkingSlot($id, $slot_number, $status, $vehicle_id);

        if ($res) {
            $arr['data'] = "Parking slot updated successfully.";
        } else {
            $arr['data'] = "Failed to update parking slot.";
        }
    } else {
        $arr['error'] = "Only PUT or PATCH methods are allowed.";
    }

    echo json_encode($arr);
?>
