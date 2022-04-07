<?php
    //    nav_bar();
    include_once ".env.php";
    // connect to the database
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
//    console_log($_POST['is_active']);
    # update the product with new manufacturer and device
    $serial_number = $_POST['serial_number'];
    $device_id = $_POST['devices'];
    $manufacturer = $_POST['manufacturers'];
    # check if serial number is already in the database
    $sql = "SELECT * FROM products WHERE serial_number = '$serial_number'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $sql = "UPDATE products ";  // SET device_id = '$device_id', manufacturer_id = '$manufacturer' WHERE SN = '$serial_number'";
        if ($_POST['is_active'] == null){
            if (isset($device_id) && $device_id != "") {
                $sql .= "SET device_id = '$device_id' ";
            }
            if (isset($manufacturer) && $manufacturer != "") {
                if (isset($device_id) && $device_id != "") {
                    $sql .= ", manufacturer_id = '$manufacturer', is_active = 0 ";
                } else {
                    $sql .= "SET manufacturer_id = '$manufacturer', is_active = 0 ";
                }
            }
        } else {
            if (isset($device_id) && $device_id != "") {
                $sql .= "SET device_id = '$device_id' ";
            }
            if (isset($manufacturer) && $manufacturer != "") {
                if (isset($device_id) && $device_id != "") {
                    $sql .= ", manufacturer_id = '$manufacturer', is_active = 1 ";
                } else {
                    $sql .= "SET manufacturer_id = '$manufacturer' is_active = 1 ";
                }
            }
        }
        $sql = $sql .  " WHERE SN = '$serial_number';";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header("Location:index.php");
        }
    }

    // close connection
    mysqli_close($con);
    # redirect back to index.php
?>

