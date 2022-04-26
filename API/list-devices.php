<?php
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
// check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM devices";
$result = mysqli_query($con, $sql);
$json_array = array();
//    $json_array[] = "Status: OK";
//    $json_array[] = "MSG: Success";
while ($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
}
header('Content-Type: application/json');
header('HTTP/1.1 200 OK');
echo json_encode($json_array, JSON_PRETTY_PRINT);

mysqli_close($con);
//}
