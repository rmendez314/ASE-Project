<?php
    include_once '.env.php';
    include_once 'db-queries.php';
    include_once 'modify-product.php';
    include_once "./components/template_html.php";
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    $devices = get_devices();
    $manufacturers = get_manufacturers();
    html_top("Home Page", "/styles/dark.css");
?>
<div id="outer" class="container">
    <div class="container" id="form-container">
        <form id="drop-down" action="drop-down-result.php" method="post">
            <h2>Query Products</h2>
            <label for="devices">Choose a Device:</label>
            <select id="devices" name="devices">
                <option value="">Select a Device</option>
                <?php
                    foreach ($devices as $row) {
                        echo "<option value='" . $row['auto_id'] . "'> " . $row['device_type'] . " </option>";
                    }
                ?>
            </select>
            <br>
            <label for="manufacturers">Choose a Manufacturer:</label>
            <select id="manufacturers" name="manufacturers">
                <option value="">Select a Manufacturer</option>
                <?php
                    foreach ($manufacturers as $row) {
                        echo "<option value='" . $row['auto_id'] . "'> " . $row['manufacturer'] . " </option>";
                    }
                ?>
            </select>
            <input type="submit" id ="submit">
        </form>
    </div>
</div>
<div id="outer" class="container">
    <div class="container" id="form-container">
        <form id="SN-form" action="search-SN.php" method="post">
        <div id="SN-form">
            <h2>Enter a Serial Number</h2>
            <label for="serial_number">Serial Number:</label>
            <input type="text" id="serial_number" name="serial_number">
            <input type="submit" id="submit">
        </div>
    </form>
    </div>
</div>
<div id="outer" class="container">
    <div class="container" id="form-container">
        <form id="add-device" action="add-device.php" method="post">
        <h2>Add a New Device Type</h2>
        <label for="add-device">Add Device Type:</label>
        <input type="text" id="add-device" name="add-device">
        <input type="submit" id="submit">
    </form>
    </div>
</div>
<div id="outer" class="container">
    <div class="container" id="form-container">
        <form id="delete-device" action="delete-device.php" method="post">
        <h2>Delete a Device Type</h2>
        <label for="delete-device">Choose a Device to Delete:</label>
        <select id="delete-device" name="delete-device">
            <option value="">Select a Device</option>
            <?php
                foreach ($devices as $row) {
                    echo "<option value='" . $row['auto_id'] . "'> " . $row['device_type'] . " </option>";
                }
            ?>
        </select>
        <input type="submit" id="submit">
    </form>
    </div>
</div>
<div id="outer" class="container">
    <div class="container" id="form-container">
        <form id="modify-product" action="modify-product.php" method="post">
            <h2>Modify a Product</h2>
            <label for="modify-product">Enter the Product SN:</label>
            <input type="text" id="serial_number" name="serial_number">
            <label for="devices">Choose a Device:</label>
            <select id="devices" name="devices">
                <option value="">Select a Device</option>
                <?php
                    foreach ($devices as $row) {
                        echo "<option value='" . $row['auto_id'] . "'> " . $row['device_type'] . " </option>";
                    }
                ?>
            </select>
            <br>
            <label for="manufacturers">Choose a Manufacturer:</label>
            <select id="manufacturers" name="manufacturers">
                <option value="">Select a Manufacturer</option>
                <?php
                    foreach ($manufacturers as $row) {
                        echo "<option value='" . $row['auto_id'] . "'> " . $row['manufacturer'] . " </option>";
                    }
                ?>
            </select>
            <input type="submit" id ="submit">
        </form>
    </div>
</div>
<div id="outer" class="container">
    <div class="container" id="form-container">
        <form id= "upload-file" action="index.php" method="post" >
        <h3>Upload File</h3>
        <input type="file" name="myfile"> <br>
        <button type="submit" name="save">upload</button>
    </form>
    </div>
</div>
<?php
    mysqli_close($con);
    html_bottom();
?>


