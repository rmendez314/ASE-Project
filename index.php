<html>
    <body>
    <?php
     require_once(".env.php");
     $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
     ?>
        <div id="drop-down">
            <h2>Select a Device</h2>
            <form id="drop-down" action="drop-down-result.php" method="post">
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
                    mysqli_close($con);
                    ?>
                </select>
                <input type="submit" id ="submit">
            </form>
        </div>
    <form id="SN-form" action="search-SN.php" method="post">
        <div id="SN-form">
            <h2>Enter a Serial Number</h2>
            <label for="serial_number">Serial Number:</label>
            <input type="text" id="serial_number" name="serial_number">
            <input type="submit" id="submit">
        </div>
    </form>
        <?php $_POST = array(); ?>
    </body>
</html>

