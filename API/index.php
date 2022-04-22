<?php
include '.env.php';
//include '/components/connect.php';

//include "components/connect.php";
$uri = $_SERVER['REQUEST_URI'];
//$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$data = explode('/', $uri);
# remove first character in data[1]
$endpoint = substr($data[2], 1);
//$endpoint = $uri[0];
//echo $endpoint;
switch ($endpoint){
    case "list-products":
        include "./list-products.php";
        break;
    case "add-device":
        echo "Add device<br>";
        break;
    case "update-product":
        echo "Update product<br>";
        break;
    case "delete-device":
        echo "Delete device<br>";
        break;
    case "upload-file":
        echo "Upload file<br>";
        break;
    case "modify-product":
        echo "Modify product<br>";
        break;
    default:
        header('Content-Type: application/json');
        header("HTTP/1.1 404 Not Found");
        $message[] = "Status: Error";
        $message[] = "Data: Endpoint not found";
        $message = "";
        echo json_encode($message);
        die();
        break;
}


