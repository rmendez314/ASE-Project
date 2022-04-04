<link rel='stylesheet' type='text/css' href='styles/index.css' />
<div id="back_button" class="back_button">
    <!--    <h2><a href="http://ec2-54-146-181-156.compute-1.amazonaws.com/index.php">back</a></h2>-->
    <button> <a href="http://ec2-54-146-181-156.compute-1.amazonaws.com/index.php"> Back </a></button>
</div>
<div>
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

                echo  "Manufacturer: " . $row["manufacturer"] . "<br>Device: " . $row['device_type'] . "<br>SN: " . $row["SN"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }
    // close the connection
    mysqli_close($con);
    ?>
</div>


