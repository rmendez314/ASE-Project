<?php
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
// check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$did =$_REQUEST['did'];
$message = array();
if(!is_numeric($did) && $did != null){
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $message[] = "Status: Invalid Data";
    $message[] = "MSG: Device ID must be numbers only";
    $message[] = "";
    $responseData = json_encode($message);
    die();
} else if ($did == null) {
  header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $message[] = "Status: Invalid Data";
    $message[] = "MSG: Null Device ID";
    $message[] = "";
    $responseData = json_encode($message);
    die();
} else {
    $sql = "SELECT * FROM devices WHERE auto_id = '$did'";
    $result = mysqli_query($con, $sql);
    $json_array = array();
    $json_array[] = "Status: OK";
    $json_array[] = "MSG: Success";
    $json_array[] = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $json_array[] = $row;
    }
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    echo json_encode($json_array, JSON_PRETTY_PRINT);

    mysqli_close($con);
}