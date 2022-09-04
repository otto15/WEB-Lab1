<?php
date_default_timezone_set('Europe/Moscow');

function check($x, $y, $r) {
    return check_if_in_triangle($x, $y, $r) && check_if_in_quarter_of_circle($x, $y, $r) && check_if_in_rectangle($x, $y, $r) ? "TRUE" : "FALSE";
}

function check_if_in_triangle($x, $y, $r) {
    return true;
}

function check_if_in_quarter_of_circle($x, $y, $r) {
    $rad = 0.5;
    return $x <= 0 && $y <= 0 && (pow($x, 2) + pow($y, 2) <= $r * $rad);
}

function check_if_in_rectangle($x, $y, $r) {
    $a1 = 0;
    $a2 = 0.5;
    $b1 = 0;
    $b2 = 1;
    return $x >= $a1 * $r && $x <= $a2 * $r && $y >= $b1 * $r && $y < $b2 * $r;
}

$start = microtime(true);

$response = [];
$current_time = date("H:i:s");
if (isset($_POST["x"]) && isset($_POST["y"]) && isset($_POST["r"])) {
        $x = $_POST["x"];
        $y = $_POST["y"];
        $r = $_POST["r"];
        if (!is_numeric($x) || !is_numeric($y) || !is_numeric($r)) {
            $data["message"] = "Only number must be passed";
            http_response_code(400);
        } else {
            $checked_hit = check($x, $y, $r);

            $finish_time = number_format((microtime(true) - $start) * 1000000, 2, ".", "");

            $data["x"] = $x;
            $data["y"] = $y;
            $data["r"] = $r;
            $data["current_time"] = $current_time;    
            $data["finish_time"] = $finish_time;
            $data["checked_hit"] = $checked_hit;
            http_response_code(200);
        }
} else {
    $data["message"] = "Some parameters are missing: x, y, r expected.";
    http_response_code(400);
}

echo json_encode($data);
?>