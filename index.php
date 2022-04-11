<?php
//#function to display a pop up window
//function popup($url, $name, $width, $height) {
//    echo "<a href=\"javascript: void(0);\" onClick=\"window.open('$url', '$name', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=$width, height=$height, left=0, top=0');\">";
//}
//echo '<script>
//    myfunction()
//</script>';
//?>

<?php
    include_once ".env.php";    // connect to the database
    include_once "components/db-queries.php";
//    include_once 'modify-product.php';
    include_once "components/template_html.php";
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    $devices = get_devices();
    $manufacturers = get_manufacturers();

    html_top("eyi617-ASE-Project", "/styles/dark.css");
?>
<div id="outer" class="container">
    <div class="container" id="form-container">
        <form id="drop-down" action="drop-down-result.php?page=1" method="post">
            <h2>Query Products</h2>
            <label for="devices">Choose a Device:</label>
            <br>
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
            <br>
            <input type="submit" id ="submit" class="btn btn-primary">
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
            <br>
            <input type="submit" id="submit" class="btn btn-primary">
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
        <br>
        <input type="submit" id="submit" class="btn btn-primary">
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
        <br>
        <input type="submit" id="submit" class="btn btn-primary">
    </form>
    </div>
</div>
<div id="outer" class="container">
    <div class="container" id="form-container">
        <form id="modify-product" action="modify-product.php" method="post">
            <h2>Modify a Product</h2>
            <label for="modify-product">Enter the Product SN:</label>
            <input type="text" id="serial_number" name="serial_number">
            <br>
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
            <br>
            <label for="is_active">Is Active:</label>
            <input type="checkbox" id="is_active" name="is_active" value="1">
            <br>
            <input type="submit" id ="submit" class="btn btn-primary">
        </form>
    </div>
</div>
<div id="outer" class="container">
    <div class="container" id="form-container">
        <form id= "upload-file" action="files-logic.php" method="post" enctype="multipart/form-data">
            <h2>Upload File</h2>
            <div id="SN-form">
                <label for="serial_number">Product Serial Number:</label>
                <input type="text" id="serial_number" name="serial_number">
            </div>
            <input type="file" name="upload-file" id="upload-file"> <br>
            <button type="submit" name="upload-file" id="upload-file" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>
<?php
    mysqli_close($con);
    html_bottom();
?>


