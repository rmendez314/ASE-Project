<div id="back_button">
    <h2><a href="http://ec2-54-146-181-156.compute-1.amazonaws.com/index.php">back</a></h2>
</div>
<?php
    require_once ".env.php";
    // connect to the database
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // get the data from the delete-device form
    $delete_device = $_POST['delete-device'];
    // insert the data into the database
    $sql = "DELETE FROM devices WHERE auto_id = '$delete_device'";
    $result = mysqli_query($con, $sql);
    // check if the data was inserted
    if (mysqli_query($con, $sql)) {
        echo "Delete successful";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    // close the connection
    mysqli_close($con);
    ?>

