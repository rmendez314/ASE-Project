<?php
    include_once ".env.php";
    // connect to the database
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    # update the product with new manufacturer and device
    $serial_number = $_POST['serial_number'];
    $device_id = $_POST['devices'];
    $manufacturer = $_POST['manufacturers'];
    $sql = "UPDATE products ";  // SET device_id = '$device_id', manufacturer_id = '$manufacturer' WHERE SN = '$serial_number'";
    if (isset($device_id) && $device_id != "") {
        $sql .= "SET device_id = '$device_id' ";
    }
    if (isset($manufacturer) && $manufacturer != "") {
        if (isset($device_id) && $device_id != "") {
            $sql .= ", manufacturer_id = '$manufacturer' ";
        } else {
            $sql .= "SET manufacturer_id = '$manufacturer' ";
        }
    }
    $sql .= "WHERE SN = '$serial_number'";
    $result = mysqli_query($con, $sql);
    // close connection
    mysqli_close($con);
    # redirect back to index.php
//    header("Location: /index.php");
    ?>

