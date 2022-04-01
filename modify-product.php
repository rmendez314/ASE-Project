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
                echo "Product Selected: <br>";
                echo  "Manufacturer: " . $row["manufacturer"] . "<br>Device: " . $row['device_type'] . "<br>SN: " . $row["SN"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }
    ?>
    <form id="drop-down" method="post">
        <label for="devices">Choose a Device:</label>
        <select id="devices" name="devices">
            <option value="">Select a Device</option>
            <?php
            # select all devices
            $sql = "SELECT * FROM devices";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='" . $row['auto_id'] . "'> " . $row['device_type'] . " </option>";
            }
            ?>
        </select>
        <label for="manufacturers">Choose a Manufacturer:</label>
        <select id="manufacturers" name="manufacturers">
            <option value="">Select a Manufacturer</option>
            <?php
            # select all devices
            $sql = "SELECT * FROM manufacturers";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='" . $row['auto_id'] . "'> " . $row['manufacturer'] . " </option>";
            }
            ?>
        </select>
        <label for="radio">Is active:</label>
        <input type="radio" name="radio" value="1">
        <input type="submit" id ="submit">
    </form>
    <?php
    # updata the product with new manufacturer and device
    if (isset($_POST['devices']) && isset($_POST['manufacturers'])) {
        $device_id = $_POST['devices'];
        $manufacturer_id = $_POST['manufacturers'];
        $is_active = $_POST['radio'];
        $serial_number = $_POST['serial_number'];
        echo $device_id . " " . $manufacturer_id . " " . $is_active . " " . $serial_number;
//        $sql = "UPDATE products
//                SET
//                    manufacturer_id = '$manufacturer_id',
//                    device_id = '$device_id',
//                    is_active = '$is_active'
//                WHERE
//                      SN = '$serial_number'";
//        if (mysqli_query($con, $sql)) {
//            echo "Record updated successfully";
//        } else {
//            echo "Error updating record: " . mysqli_error($con);
//        }
    }
    mysqli_close($con);
    ?>