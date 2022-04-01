<div id="drop-down-result">
    <?php
    require_once ".env.php";
    // connect to the database
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // check if post array is empty
    if (!empty($_POST)) {
        // check the post array if devices is set
        if (isset($_POST['devices'])) {
            // store the value of the devices array in a $device_type variable
            $device_id = $_POST['devices'];
            $sql = "SELECT * FROM devices WHERE auto_id LIKE '$device_id'";
            $result = mysqli_query($con, $sql);
            // check if there are any results
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "Device Selected: " . $row["device_type"] . "<br>";
                }
            }
        } else {
            echo "Post is not set\n";
        }
        $manuf_id = $_POST['manufacturers'];
        $sql = "SELECT * FROM manufacturers WHERE auto_id LIKE '$manuf_id'";
        $result = mysqli_query($con, $sql);
        // check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "Manufacturer Selected: " . $row["manufacturer"] . "<br>";
            }
        }
        $sql = "SELECT * FROM products WHERE manufacturer_id LIKE '$manuf_id' AND device_id LIKE '$device_id' LIMIT 100";
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
        echo "Post is not set\n";
    }
    ?>
</div>