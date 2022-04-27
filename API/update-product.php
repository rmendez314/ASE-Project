<?php
//    nav_bar();
include_once ".env.php";    // connect to the database
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
// check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$SN = $_REQUEST['SN'];
$device = $_REQUEST['device'];
$manufacturer = $_REQUEST['manufacturer'];
$is_active = $_REQUEST['is_active'];
$message = array();

if(is_numeric($device) && $device != null || is_numeric($manufacturer) && $manufacturer != null || !is_numeric($is_active) && $is_active != null){
    header('Content-Type: application/json');
    header('HTTP/1.1 200 OK');
    $message[] = "Status: Invalid Data";
    $message[] = "MSG: One or more fields dont have the correct input";
    $message[] = "";
    $responseData = json_encode($message);
    die();
} else {
    # check if serial number is already in the database
    $sql = "SELECT * FROM products WHERE SN = '$SN'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $final_sql = "UPDATE products SET ";  // SET device_id = '$device_id', manufacturer_id = '$manufacturer' WHERE SN = '$serial_number'";
        if (!isset($is_active) || $is_active == 0) {
            if (isset($device)) {
                $sql = "SELECT auto_id FROM devices WHERE device_type = '$device'";
                $result = mysqli_query($con, $sql);
                $device_id = $result->fetch_assoc()['auto_id'];
                $final_sql .= " device_id = '$device_id', ";
            }
            if (isset($manufacturer) && $manufacturer != "") {
                $sql = "SELECT auto_id FROM manufacturers WHERE manufacturer = '$manufacturer'";
                $result = mysqli_query($con, $sql);
                $manufacturer_id = $result->fetch_assoc()['auto_id'];
                if (isset($device)) {
                    $final_sql .= " manufacturer_id = '$manufacturer_id, ";
                } else {
                    $final_sql .= " manufacturer_id = '$manufacturer_id', ";
                }
            }
            $final_sql .= "is_active = 0 ";
        } else {
            if (isset($device)) {
                $sql = "SELECT auto_id FROM devices WHERE device_type = '$device'";
                $result = mysqli_query($con, $sql);
                $device_id = $result->fetch_assoc()['auto_id'];
                $final_sql .= " device_id = '$device_id', ";
            }
            if (isset($manufacturer)) {
                $sql = "SELECT auto_id FROM manufacturers WHERE manufacturer = '$manufacturer'";
                $result = mysqli_query($con, $sql);
                $manufacturer_id = $result->fetch_assoc()['auto_id'];
                if (isset($device)) {
                    $final_sql .= " manufacturer_id = '$manufacturer_id', ";
                } else {
                    $final_sql .= " manufacturer_id = '$manufacturer_id', ";
                }
            }
            $final_sql .= "is_active = 1 ";
        }
        $final_sql = $final_sql . " WHERE SN = '$SN'";
        echo $final_sql;
//        $result = mysqli_query($con, $sql);
//        $message = array();
//
//        if($result){
//            header('Content-Type: application/json');
//            header('HTTP/1.1 200 OK');
//            $message[] = "Status: Success";
//            $message[] = "MSG: Product updated successfully";
//        } else {
//            header('Content-Type: application/json');
//            header('HTTP/1.1 500 Internal Server Error');
//            $message[] = "Status: Failed";
//            $message[] = "MSG: Product update failed";
//        }
//        $message[] = " ";
//        $responseData = json_encode($message);
//        echo $responseData;
//        die();
    }
}