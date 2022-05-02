<?php
include_once ".env.php";    // connect to the database
include_once "components/template_html.php";
include_once "components/db-queries.php";

function update_product($current_page, $serial_number){
    html_top("eyi617-ASE-Project", "/styles/dark.css");
    $devices = get_devices();
    $manufacturers = get_manufacturers();
    echo "<div name=\"update-product\" id=\"update-product\">
        <div id=\"outer\" class=\"container\">
            <div class=\"container\" id=\"form-container\">
                <form id=\"modify-product\" action=\"modify-product.php\" method=\"post\">
                    <h2>Modify the Product : $serial_number</h2>
                    <input type='hidden' name='current_page' id='current_page' value='$current_page'>
                    <input type='hidden' name='serial_number' id ='serial_number' value='$serial_number'>
                    <label for=\"devices\">Choose a Device:</label>
                    <select id=\"devices\" name=\"devices\">
                        <option value=\"\">Select a Device</option>";
                        foreach ($devices as $row) {
                            echo "<option value='" . $row['auto_id'] . "'> " . $row['device_type'] . " </option>";
                        }
                    echo "</select>
                    <br>
                    <label for=\"manufacturers\">Choose a Manufacturer:</label>
                    <select id=\"manufacturers\" name=\"manufacturers\">
                        <option value=\"\">Select a Manufacturer</option>
                    ";
                        foreach ($manufacturers as $row) {
                            echo "<option value='" . $row['auto_id'] . "'> " . $row['manufacturer'] . " </option>";
                        }
                    echo "</select>
                    <br>
                    <label for=\"is_active\">Is Active:</label>
                    <input type=\"checkbox\" id=\"is_active\" name=\"is_active\" value=\"1\">
                    <br>
                    <input type=\"submit\" id =\"submit\" class=\"btn btn-primary\">
                </form>
            </div>
        </div>
    </div>
    ";
    echo "<div id=\"outer\" class=\"container\">
            <div class=\"container\" id=\"form-container\">
                <form id= \"upload-file\" action=\"files-logic.php\" method=\"post\" enctype=\"multipart/form-data\">
                    <h2>Upload File for: $serial_number</h2>
                    <input type='hidden' name='serial_number' id='serial_number' value='$serial_number'>
                    <input type=\"file\" name=\"upload-file\" id=\"upload-file\"> <br>
                    <button type=\"submit\" name=\"upload-file\" id=\"upload-file\" class=\"btn btn-primary\">Upload</button>
                </form>
            </div>
          </div>";
    html_bottom();
}

if(isset($_POST['update_product']) && isset($_POST['current_page'])){
    update_product($_POST['current_page'], $_POST['update_product']);
}