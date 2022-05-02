<?php
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
// check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$device =$_REQUEST['name'];
if(is_numeric($device) && $device != null){
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $message[] = "Status: Invalid Data";
    $message[] = "MSG: Device ID must not be numeric";
    $message[] = "";
    $responseData = json_encode($message);
    die();
} else if ($device == null) {
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $message[] = "Status: Invalid Data";
    $message[] = "MSG: Null Device ID";
    $message[] = "";
    $responseData = json_encode($message);
    die();
} else {
    $sql = "INSERT INTO devices (device_type) VALUES ('$device')";
    $result = mysqli_query($con, $sql);
    $json_array = array();
    $json_array[] = "Status: OK";
    $json_array[] = "MSG: Successfully added device: " . $device;
    $json_array[] = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $json_array[] = $row;
    }
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    echo json_encode($json_array, JSON_PRETTY_PRINT);

    mysqli_close($con);
}