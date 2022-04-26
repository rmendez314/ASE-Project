<?php

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
// check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$SN = $_REQUEST['SN'];
//if (is_numeric($SN) && $SN != null) {
//    header('Content-Type: application/json');
//    header('HTTP/1.1 200 OK');
//    $message[] = "Status: Invalid Data";
//    $message[] = "MSG: Product ID must be numbers only";
//    $message[] = "";
//    $responseData = json_encode($message);
//    die();
if ($SN == null) {
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $message[] = "Status: Invalid Data";
    $message[] = "MSG: Null Product ID";
    $message[] = "";
    $responseData = json_encode($message);
    die();
} else {
    $sql = "SELECT * FROM products WHERE SN = '$SN'";
    $result = mysqli_query($con, $sql);
    $json_array = array();
    $json_array[] = "Status: OK";
    $json_array[] = "MSG: Successfully found product with SN: " . $SN;
    $json_array[] = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $json_array[] = $row;
    }
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    echo json_encode($json_array, JSON_PRETTY_PRINT);

    mysqli_close($con);
}