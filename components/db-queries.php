<?php
include_once '.env.php';
function get_devices(){
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    # select all devices
    $sql = "SELECT * FROM devices";
    $result = mysqli_query($con, $sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}
# function to get all manufacturers
function get_manufacturers(){
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    # select all manufacturers
    $sql = "SELECT * FROM manufacturers";
    $result = mysqli_query($con, $sql);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    return $rows;
}