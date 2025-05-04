<?php
$temperature = $_POST['temperature'];
$humidity = $_POST['humidity'];
$rain = $_POST['rain'];
$soil = $_POST['soil'];
$pressure = $_POST['pressure'];
$altitude = $_POST['altitude'];

// Save to a file, database, etc.
$file = fopen("sensor_data.json", "w");
fwrite($file, json_encode($_POST));
fclose($file);
?>
