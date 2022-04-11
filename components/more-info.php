<?php
include_once ".env.php";
#function to update the product
function get_product_id($SN){
    // connect to the database
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT auto_id FROM products WHERE SN LIKE '$SN'";
    $result = mysqli_query($con, $sql);
    $product = mysqli_fetch_assoc($result);
    return $product['auto_id'];
}

function get_product_info($SN){
    // connect to the database
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM products WHERE SN LIKE '$SN'";
    $result = mysqli_query($con, $sql);

    return mysqli_fetch_assoc($result);;
}

function get_devices(){
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    # select all devices
    $sql = "SELECT * FROM devices";
    $result = mysqli_query($con, $sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}
# function to get all manufacturers
function get_manufacturers(){
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    # select all manufacturers
    $sql = "SELECT * FROM manufacturers";
    $result = mysqli_query($con, $sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function get_device_by_ID($device_id){
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    # select all manufacturers
    $sql = "SELECT * FROM devices WHERE auto_id = '$device_id'";
    $result = mysqli_query($con, $sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function get_device_by_type($device_type){
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    # select all manufacturers
    $sql = "SELECT * FROM devices WHERE device_type = '$device_type'";
    $result = mysqli_query($con, $sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function get_manufacturer_by_ID($manufacturer_id){
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    # select all manufacturers
    $sql = "SELECT * FROM manufacturers WHERE auto_id = '$manufacturer_id'";
    $result = mysqli_query($con, $sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

function get_manufacturer_by_name($manufacturer_name){
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    # select all manufacturers
    $sql = "SELECT * FROM manufacturers WHERE manufacturer = '$manufacturer_name'";
    $result = mysqli_query($con, $sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}

