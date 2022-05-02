<?php
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
// check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$serial_number = $_REQUEST['SN'];
$uploads_dir = '/var/www/html/files/';
$sql1="Select auto_id from products where SN like '%$serial_number%' limit 1";
$result = $con->query($sql1) or die($con->error);
while($row = $result->fetch_assoc()) {
    $product_id = $row["auto_id"];
}

if($_FILES['file']['size'] > 0){
    #setup new location for file
    $file_name = str_replace(" ", "_", basename($_FILES["file"]["name"]));
    $fileSize = $_FILES['upload-file']['size'];
    $fileType = $_FILES['upload-file']['type'];
    $file_link = '/files/'.$file_name;
    $file_path = $uploads_dir.$file_name;
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $file_path)){

        # Insert into database
        $sql = "INSERT INTO file_manager (file_name, file_link, type, size, product_id) VALUES ('$file_name', '$file_link', '$fileType', '$fileSize', '$product_id')";

        if(mysqli_query($con,$sql)){
            #return 200 response
            header('Content-Type: application/json');
            header("HTTP/1.1 200 OK");
            $message[]="Status: Success";
            $message[]="MSG: File uploaded";
            $message[]="";
            echo json_encode($message);
        }
        else{
            #return 500 response something went wrong
            header('Content-Type: application/json');
            header("HTTP/1.1 500 Internal Server Error");
            $message[]="Status: Error";
            $message[]="MSG: Something went wrong";
            $message[]="";
            echo json_encode($message);
        }
    }
    else {
        header('Content-Type: application/json');
        header('HTTP/1.1 400 Bad Request');
        $output[]="Status: Invalid Data";
        $output[]="MSG: Failed to upload file: $file_name.";
        $output[]="";
        $responseData=json_encode($output);
        echo $responseData;
        die();
    }

}
else{
    #http 400
    header('Content-Type: application/json');
    header('HTTP/1.1 400 BAD REQUEST');
    $output[]="Status: Invalid Data";
    $output[]="MSG: File upload failed";
    $output[]="";
    $responseData=json_encode($output);
    echo $responseData;
}
?>