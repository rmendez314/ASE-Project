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

// close the connection
mysqli_close($con);