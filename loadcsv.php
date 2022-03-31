<?php
// connect.php
include_once ".env.php";
// open the connection
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
//verify connection
if (!$con) {
    exit("<p class='error'>Connection Error: " . mysqli_connect_error() . "</p>");
} else {
    echo "<p class='success'>Connected to the database successfully.</p>";
}
// load devices.csv into the 'devices' table in the database
$sql = "LOAD DATA LOCAL INFILE '/data/devices.csv' INTO TABLE devices FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\n' IGNORE 1 LINES (auto_id)";



$result = mysqli_query($con, $sql);


