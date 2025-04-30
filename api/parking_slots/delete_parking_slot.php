<?php
    header("Access-Control-Allow-Methods: DELETE");
    header("Content-Type: application/json");

    include('../../config/config.php');

    $config = new Config();

    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        $input = file_get_contents('php://input');
        parse_str($input, $_DELETE);

        $id = $_DELETE['id'];

        $res = $config->deleteParkingSlot($id);

        if ($res) {
            $arr['data'] = "Parking slot deleted successfully.";
        } else {
            $arr['data'] = "Failed to delete parking slot.";
        }
    } else {
        $arr['error'] = "Only DELETE method is allowed.";
    }

    echo json_encode($arr);
?>
