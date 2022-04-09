<?php

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

