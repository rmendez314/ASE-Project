<div id="back_button" class="back_button">
    <h2><a href="http://ec2-54-146-181-156.compute-1.amazonaws.com/index.php">back</a></h2>
</div>
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
        $device_id = $_POST['devices'];
        $manuf_id = $_POST['manufacturers'];
        echo "Device Selected: " . $device_id . "<br>";
        echo "Manufacturer Selected: " . $manuf_id . "<br>";
        if (isset($_POST['devices']) && $_POST['manufacturers'] == "") {
            $sql = "SELECT * FROM products WHERE device_id LIKE '$device_id' LIMIT 10000";
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
            $sql = "SELECT * FROM products WHERE manufacturer_id LIKE '$manuf_id' LIMIT 10000";
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
            $sql = "SELECT * FROM products WHERE manufacturer_id = '$manuf_id' AND device_id = '$device_id' LIMIT 10000";
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
    ?>
</div>
