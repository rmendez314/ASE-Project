<?php
include './.env.php';
//include '/components/connect.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
$uri = explode('&', $uri);
$endpoint = $uri[0];

switch ($endpoint){
    case "list-products":
        include "./list-products.php";
        break;
    case "add-device":
        include "./add-device.php";
        break;
    case "update-product":
        include "./update-product.php";
        break;
    case "delete-device":
        include "./delete-device.php";
        break;
    case "upload-file":
        include "./upload-file.php";
        break;
    case "list-devices":
        include "./list-devices.php";
        break;
    case "list-manufacturers":
        include "./list-manufacturers.php";
        break;
    case "search-product-SN":
        include "./search-product-SN.php";
        break;
    case "view-device-SN":
        include "./view-device-SN.php";
        break;
    case "view-product":
        include ("./view-product.php");
        break;
    default:
        header('Content-Type: application/json');
        header("HTTP/1.1 404 Not Found");
        $message[] = "Status: Error";
        $message[] = "Data: Endpoint not found";
        $message = "";
        echo json_encode($message);
        die();
}


