<?php
echo "
<div id=\"outer\" class=\"container\">
    <div class=\"container\" id=\"form-container\">
        <form id= \"upload-file\" action=\"files-logic.php\" method=\"post\" enctype=\"multipart/form-data\">
            <h2>Upload File</h2>
            <div id=\"SN-form\">
                <label for=\"serial_number\">Product Serial Number:</label>
                <input type=\"text\" id=\"serial_number\" name=\"serial_number\">
            </div>
            <input type=\"file\" name=\"upload-file\" id=\"upload-file\"> <br>
            <button type=\"submit\" name=\"upload-file\" id=\"upload-file\" class=\"btn btn-primary\">Upload</button>
        </form>
    </div>
</div>";
