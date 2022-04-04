<!--<link rel='stylesheet' type='text/css' href='styles/index.css' />-->
<!--<div id="back_button" class="back_button">-->
<!--        <h2><a href="http://ec2-54-146-181-156.compute-1.amazonaws.com/index.php">back</a></h2>-->
<!--    <button> <a href="http://ec2-54-146-181-156.compute-1.amazonaws.com/index.php"> Back </a></button>-->
<!--</div>-->
<!--<div id="old-product">-->
<!--    <h2> Original Product Selected </h2>-->
<?php
    include_once ".env.php";
    // set the serial number cookie
//    if (isset($_POST['serial_number'])) {
//        setcookie("serial_number", $_POST['serial_number'], time() + (86400 * 2), "/");
//    }
    // connect to the database
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $serial_number = $_POST['serial_number'];
    $device_id = $_POST['devices'];
    $manufacturer = $_POST['manufacturers'];

//    if (isset($_POST['serial_number'])){
//        $serial_number = $_POST['serial_number'];
//        $sql = "SELECT devices.device_type, manufacturers.manufacturer, SN FROM products
//                    INNER JOIN devices ON products.device_id = devices.auto_id
//                    INNER JOIN manufacturers ON products.manufacturer_id = manufacturers.auto_id
//                    WHERE SN = '$serial_number'";
//        $result = mysqli_query($con, $sql);
//
//
//        if (mysqli_num_rows($result) > 0) {
//            while($row = mysqli_fetch_assoc($result)) {
//                echo "Product Selected: <br>";
//                echo  "Manufacturer: " . $row["manufacturer"] . "<br>Device: " . $row['device_type'] . "<br>SN: " . $row["SN"] . "<br>";
////                setcookie("og_device", $row['device_type'], time() + (86400 * 2), "/");
////                setcookie("og_manufacturer", $row['manufacturer'], time() + (86400 * 2), "/");
//            }
//        } else {
//            echo "0 results";
//        }
//    }
//    ?>
<!--    <form id="drop-down" method="get" action="modify-product.php">-->
<!--        <h2> Update Product </h2>-->
<!--        <label for="device_id">Choose a Device:</label>-->
<!--        <select id="device_id" name="device_id">-->
<!--            <option value="">Select a Device</option>-->
<!--            --><?php
            # select all devices
//            $sql = "SELECT * FROM devices";
//            $result = mysqli_query($con, $sql);
//            while ($row = mysqli_fetch_array($result)) {
//                echo "<option value='" . $row['auto_id'] . "'> " . $row['device_type'] . " </option>";
//            }
//            ?>
<!--        </select>-->
<!--        <br>-->
<!--        <label for="manufacturer_id">Choose a Manufacturer:</label>-->
<!--        <select id="manufacturer_id" name="manufacturer_id">-->
<!--            <option value="">Select a Manufacturer</option>-->
<!--            --><?php
//            # select all devices
//            $sql = "SELECT * FROM manufacturers";
//            $result = mysqli_query($con, $sql);
//            while ($row = mysqli_fetch_array($result)) {
//                echo "<option value='" . $row['auto_id'] . "'> " . $row['manufacturer'] . " </option>";
//            }
//            ?>
<!--        </select>-->
<!--        <br>-->
<!--        <label for="radio">Is active:</label>-->
<!--        <input id="radio" type="radio" name="radio" value="1">-->
<!--        <input type="submit" id ="submit">-->
<!--    </form>-->
<?php
    # update the product with new manufacturer and device
    if ($_POST['device_id'] != "" && $_POST['manufacturer_id'] != "") {
        $serial_number = $_POST['serial_number'];
        $device_id = $_POST['devices'];
        $manufacturer = $_POST['manufacturers'];
        console_log($serial_number);
        console_log($device_id);
        console_log($manufacturer);
//            $device_id = $_GET['device_id'];
//            $manufacturer_id = $_GET['manufacturer_id'];
//            $is_active = $_GET['radio'];
        echo "Device: " . $device_id . "<br>";
        echo "Manufacturer: " . $manufacturer . "<br>";
        echo "Serial Number: " . $serial_number . "<br>";
//            $sql = "UPDATE products SET manufacturer_id = '$manufacturer_id', device_id = '$device_id' WHERE SN = '$serial_number'";
//            $result = mysqli_query($con, $sql);
//            if ($result) {
//                echo "Updated Product Info: <br>";
//                echo "Device: " . $device_id . "<br>";
//                echo "Manufacturer: " . $manufacturer_id . "<br>";
//                echo "Serial Number: " . $serial_number . "<br>";
//            } else {
//                echo "Error: " . $sql . "<br>" . mysqli_error($con);
//            }
    } elseif ($_POST['device_id'] != "" && $_POST['manufacturer_id'] == "") {
        $serial_number = $_POST['serial_number'];
        $device_id = $_POST['devices'];
        $manufacturer = $_POST['manufacturers'];
        echo "Device: " . $device_id . "<br>";
        echo "Manufacturer: " . $manufacturer . "<br>";
        echo "Serial Number: " . $serial_number . "<br>";
//            $device_id = $_GET['device_id'];
//            $is_active = $_GET['radio'];
//            $sql = "UPDATE products SET device_id = '$device_id' WHERE SN = '$serial_number'";
//            $result = mysqli_query($con, $sql);
//            if($result) {
//                echo "Updated Product Info: <br>";
//                echo "Device: " . $device_id . "<br>";
//                echo "Manufacturer: " . $_COOKIE['og_manufacturer'] . "<br>";
//                echo "Serial Number: " . $serial_number . "<br>";
//            } else {
//                echo "Error: " . $sql . "<br>" . mysqli_error($con);
//            }
    } elseif ($_POST['device_id'] == "" && $_POST['manufacturer_id'] != "") {
        $serial_number = $_POST['serial_number'];
        $device_id = $_POST['devices'];
        $manufacturer = $_POST['manufacturers'];
//            $manufacturer_id = $_GET['manufacturer_id'];
//            $is_active = $_GET['radio'];
//            $sql = "UPDATE products SET manufacturer_id = '$manufacturer_id' WHERE SN = '$serial_number'";
//            $result = mysqli_query($con, $sql);
//            if( $result ) {
//                echo "Updated Product Info: <br>";
//                echo "Device: " . $_COOKIE['og_device'] . "<br>";
//                echo "Manufacturer: " . $manufacturer_id . "<br>";
//                echo "Serial Number: " . $serial_number . "<br>";
//            } else {
//                echo "Error updating record: " . mysqli_error($con);
//            }
        echo "Device: " . $device_id . "<br>";
        echo "Manufacturer: " . $manufacturer . "<br>";
        echo "Serial Number: " . $serial_number . "<br>";
    }
//    }
    // close connection
    mysqli_close($con);

    ?>

