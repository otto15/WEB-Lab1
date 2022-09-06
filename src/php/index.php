<?php
include 'checker.php';

date_default_timezone_set('UTC');

$start = microtime(true);

$response = [];

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(!isset($_SESSION['table'])) {
        $_SESSION['table'] = '';
    }

    $response = $_SESSION['table'];

    exit($response);
}

if (isset($_POST["x"]) && isset($_POST["y"]) && isset($_POST["r"]) && isset($_POST["utc"])) {


        $x = $_POST["x"];
        $y = $_POST["y"];
        $r = $_POST["r"]; 
        $utc = $_POST["utc"]; 
        if (!is_numeric($x) || !is_numeric($y) || !is_numeric($r) || !is_numeric($_POST["utc"])) {
            $data["message"] = "Only number must be passed";
            http_response_code(400);
        } else {
            $current_time = date("H:i:s", time() - $utc * 60); 
            $checker = new HitChecker();

            $checked_hit = $checker->check($x, $y, $r);

            $finish_time = number_format((microtime(true) - $start) * 1000000, 2, ".", "");

            $data["x"] = $x;
            $data["y"] = $y;
            $data["r"] = $r;
            $data["current_time"] = $current_time;    
            $data["finish_time"] = $finish_time;
            $data["checked_hit"] = $checked_hit;

            

            $row = "
            <tr>
                <th>$x</th>
                <th>$y</th>
                <th>$r</th>
                <th>$current_time</th>
                <th>$finish_time</th>
                <th>$checked_hit</th>
            </tr>";

            if(!isset($_SESSION['table'])) {
                $_SESSION['table'] = '';
            }

            $response = $_SESSION['table'].$row;

            $_SESSION['table'] = $response;

            http_response_code(200);
        }
} else {
    $data["message"] = "Some parameters are missing: x, y, r expected.";
    http_response_code(400);
}

echo $response;
?>