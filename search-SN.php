<?php
    require_once ".env.php";
    // connect to the database
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // get the search term from the user
    if (isset($_POST['serial_number'])){
        $serial_number = $_POST['serial_number'];
        $sql = "SELECT devices.device_type, manufacturers.manufacturer, SN FROM products 
                INNER JOIN devices ON products.device_id = devices.auto_id 
                INNER JOin manufacturers ON products.manufacturer_id = manufacturers.auto_id 
                WHERE SN = '$serial_number'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "Device Type"  . "        " . "Manufacturer" . "          " . "Serial Number <br>";
                echo $row["device_type"] . " " . $row["manufacturer"] . " " . $row["SN"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }