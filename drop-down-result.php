<?php
include_once ".env.php";
//# function to select products where device is like device_id
//function select_devices($device_id) {
//    console_log("Function: " . $device_id);
//    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
//    $sql = "SELECT * FROM products WHERE device_id LIKE '$device_id';";
//    $result = mysqli_query($con, $sql);
//    $row = $result->fetch_all(MYSQLI_ASSOC);
//    return $row;
//}
//# function to select products where manufacturer is like manufacturer_id
//function select_manufacturer($manufacturer_id) {
//    console_log($manufacturer_id);
//    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
//    $sql = "SELECT * FROM products WHERE manufacturer_id LIKE '$manufacturer_id';";
//    $result = mysqli_query($con, $sql);
//    $row = $result->fetch_all(MYSQLI_ASSOC);
//    return $row;
//}
//# function to select products where manufacturer is like manufacturer_id and device is like device_id
//function select_both($manufacturer_id, $device_id) {
//    console_log($device_id);
//    console_log($manufacturer_id);
//    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
//    $sql = "SELECT * FROM products WHERE manufacturer_id = '$manufacturer_id' AND device_id = '$device_id';";
//    $result = mysqli_query($con, $sql);
//    $row = $result->fetch_all(MYSQLI_ASSOC);
//    return $row;
//}
//#function to echo products
//function echo_products($products) {
//    echo "Selecting Products: 1-" . count($products) . "<br>";
//    foreach ($products as $row) {
//        echo "Product Selected: " . $row['SN'] . "<br>";
//    }
//}
// connect to the database
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
// check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
//$device_id = $_POST['devices'];
//$manufacturer_id = $_POST['manufacturers'];
//console_log("Device: " . $device_id);
//console_log("Manufacturer: " . $manufacturer_id);
//if(!empty($_POST)){
//    if (isset($_POST['devices']) && $_POST['manufacturers'] == "") {
//        $device_id = $_POST['devices'];
//        $products = select_devices($device_id);
//    } elseif (isset($_POST['manufacturers']) && $_POST['devices'] == "") {
//        $manufacturer_id = $_POST['manufacturers'];
//        $products = select_manufacturer($manufacturer_id);
//    }
//    else {
//        $manufacturer_id = $_POST['manufacturers'];
//        $device_id = $_POST['devices'];
//        $products = select_both($device_id, $manufacturer_id);
//    }
//    echo_products($products);
//} else {
//    echo "Post is empty.";
//}


    // check if post array is empty
    if (!empty($_POST)) {
        $device_id = $_POST['devices'];
        $manuf_id = $_POST['manufacturers'];
        echo "Device Selected: " . $device_id . "<br>";
        echo "Manufacturer Selected: " . $manuf_id . "<br>";
        if (isset($_POST['devices']) && $_POST['manufacturers'] == "") {
            $sql = "SELECT * FROM products WHERE device_id LIKE '$device_id'";
            $result = mysqli_query($con, $sql);
            // check if there are any results
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "Product Selected: " . $row["SN"] . "<br>";
                }
            } else {
                echo "0 results";
            }
        } elseif ($_POST['devices'] == "" && (isset($_POST['manufacturers']))) {
            $sql = "SELECT * FROM products WHERE manufacturer_id LIKE '$manuf_id'";
            $result = mysqli_query($con, $sql);
            // check if there are any results
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "Product Selected: " . $row["SN"] . "<br>";
                }
            } else {
                echo "0 results";
            }

        } else {
            $sql = "SELECT * FROM products WHERE manufacturer_id = '$manuf_id' AND device_id = '$device_id'";
            $result = mysqli_query($con, $sql);
            // check if there are any results
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "Product Selected: " . $row["SN"] . "<br>";
                }
            } else {
                echo "0 results";
            }
        }
    }
    // close the connection
    mysqli_close($con);
//    html_bottom();
?>