<?php
$uri = $_SERVER['REQUEST_URI'];
$data = explode('/', $uri);
$endpoint= substr($data[2],0,-1);
switch ($endpoint){
    case "list-products":
        echo "List products";
        break;
    case "add-device":
        break;
    case "update-product":
        break;
    case "delete-device":
        break;
    case "upload-file":
        break;
    case "modify-product":
        break;
    default:
        break;
}
echo "URI: $uri<br>";
//foreach ($data as $key => $value) {
//    echo    "Key:" . $key . ' => ' . $value . '<br>';
////    if ($value == 'API') {
////        $data = $data[$key + 1];
////    }
//}
echo "Data: $data<br>";

