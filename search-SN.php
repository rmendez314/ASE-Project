<?php
    include_once "components/nav_bar.php";
    include_once "components/footer.php";
    include_once ".env.php";
    include_once "./components/template_html.php";


    html_top("eyi617-ASE-Project", "/styles/dark.css");
    // connect to the database
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // get the search term from the user
    if (isset($_POST['serial_number'])){
        $serial_number = $_POST['serial_number'];
        $sql = "SELECT *
                FROM products 
                INNER JOIN devices ON products.device_id = devices.auto_id 
                INNER JOIN manufacturers ON products.manufacturer_id = manufacturers.auto_id 
                WHERE SN = '$serial_number'";
        $result = mysqli_query($con, $sql);
        echo "<table class=\"table table-striped\">
                    <thead>
                        <th>Product ID</th>
                        <th>Device</th>
                        <th>Manufacturer</th>
                        <th>Serial Number</th>  
                        <th>Status</th>
                    </thead>
                    <tbody>";
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                            <td>".$row['auto_id']."</td>
                            <td>".$row['device_type']."</td>  
                            <td>".$row['manufacturer']."</td>
                            <td>".$row['SN']."</td>
                       ";
                if ($row['is_active'] == 1){
                    echo "<td>Active</td>";
                } else {
                    echo "<td>Inactive</td>";
                }
            }
        } else {
            echo "0 results";
        }
        echo "    </tbody>
                      </table>";
    }
    // close the connection
    mysqli_close($con);
    html_bottom();
    ?>
</div>


