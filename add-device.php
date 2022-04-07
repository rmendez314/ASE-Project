<?php
require_once ".env.php";
// connect to the database
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
// check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

//function addDevice() {
//    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
//    $new_device_name = $_POST['add-device'];
//    $sql = "INSERT INTO devices (device_type) VALUES ('$new_device_name')";
//    $result = mysqli_query($con, $sql);
//    if ($result) {
//        header("Location: index.php");
//    } else {
//        echo "Error: " . $sql . "<br>" . mysqli_error($con);
//    }
//}
    // get the data from the form
    $new_device = $_POST['add-device'];
    // check if the device is already in the database
    $sql = "SELECT * FROM devices WHERE device_type = '$new_device'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Device already exists";
    } else {
        // insert the new device into the database
        $sql = "INSERT INTO devices (device_type) VALUES ('$new_device')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
    // close the connection
    mysqli_close($con);
    ?>
</div>
