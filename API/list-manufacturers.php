<?php
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
// check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// query the database to get the list of manufacturers
$sql = "SELECT * FROM manufacturers";
$result = mysqli_query($con, $sql);
// store the json data in a variable
$json_array = array();
$json_array[] = "Status: OK";
$json_array[] = "MSG: Success";
$json_array[] = " ";
while ($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
}
// display JSON data
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
echo json_encode($json_array, JSON_PRETTY_PRINT);
// close the connection
mysqli_close($con);
//}
