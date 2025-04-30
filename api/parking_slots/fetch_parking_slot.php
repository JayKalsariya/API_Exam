<?php
    header("Access-Control-Allow-Methods: GET");
    header("Content-Type: application/json");

    include('../../config/config.php');

    $config = new Config();

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        http_response_code(200);

        $result = $config->fetchParkingSlots();

        $all_slots = [];

        while ($record = mysqli_fetch_assoc($result)) {
            array_push($all_slots, $record);
        }

        $arr['data'] = $all_slots;
    } else {
        $arr['error'] = "Only GET method is allowed.";
    }

    echo json_encode($arr);
?>
