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
                ?>
            </select>
            <input type="submit" id ="submit">
        </form>
    </div>
    <div id ="SN-form">
        <form id="SN-form" action="search-SN.php" method="post">
            <div id="SN-form">
                <h2>Enter a Serial Number</h2>
                <label for="serial_number">Serial Number:</label>
                <input type="text" id="serial_number" name="serial_number">
                <input type="submit" id="submit">
            </div>
        </form>
    </div>
    <div id="add-device">
        <form id="add-device" action="add-device.php" method="post">
            <h2>Add a New Device Type</h2>
            <label for="add-device">Add Device Type:</label>
            <input type="text" id="add-device" name="add-device">
            <input type="submit" id="submit">
        </form>
    </div>
    <div id = "delete-device">
        <form id="delete-device" action="delete-device.php" method="post">
            <h2>Delete a Device Type</h2>
            <label for="delete-device">Choose a Device to Delete:</label>
            <select id="delete-device" name="delete-device">
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
            <input type="submit" id="submit">
        </form>
    </div>
    <div id = "modify-product">
        <form id="modify-product" action="modify-product.php" method="post">
            <h2>Modify a Product</h2>
            <label for="modify-product">Enter the Product SN:</label>
            <input type="text" id="serial_number" name="serial_number">
            <input type="submit" id="submit">
        </form>
    </div>
    <?php mysqli_close($con); ?>
    </body>
</html>

