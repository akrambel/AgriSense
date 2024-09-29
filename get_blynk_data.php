<?php
// Blynk Auth Token
$auth_token = "pzJxV2urte3Epw-27dtw6p4zHZ4HyfAw";

// Virtual Pins
$global_warming_pin = "V0";
$humidity_pin = "V1";
$rainfall_pin = "V2";
$pressure_pin = "V3";
$soil_moisture_pin = "V4";
$temperature_pin = "V5";
$altitude_pin = "V6";


// Function to get data from Blynk
function get_blynk_data($pin) {
    global $auth_token;
    $url = "http://blynk-cloud.com/$auth_token/get/$pin";
    $response = file_get_contents($url);
    return json_decode($response, true)[0];
}

// Fetch all sensor data
$data = [
    "humidity" => get_blynk_data($humidity_pin),
    "temperature" => get_blynk_data($temperature_pin),
    "pressure" => get_blynk_data($pressure_pin),
    "altitude" => get_blynk_data($altitude_pin),
    "soil_moisture" => get_blynk_data($soil_moisture_pin),
    "global_warming" => get_blynk_data($global_warming_pin),
    "rainfall" => get_blynk_data($rainfall_pin),
];

// Return JSON response
header('Content-Type: application/json');
echo json_encode($data);
?>