<?php
// connect to the database
include_once "components/nav_bar.php";
include_once "components/footer.php";
include_once ".env.php";    // connect to the database
include_once "./components/template_html.php";
include_once "./components/more-info.php";


html_top("eyi617-ASE-Project", "/styles/dark.css");
// connect to the database
if (isset($_POST['upload-file']))
{
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    if (!$con)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $product_id = get_product_id($_POST['serial_number']);

    $target_dir = "/var/www/html/files/";
    $file_name = str_replace(" ", "_", basename($_FILES["upload-file"]["name"]));
    $target_file = $target_dir . $file_name;
    $file_link = '/files/'.$file_name;
    $fileSize = $_FILES['upload-file']['size'];
    $fileType = $_FILES['upload-file']['type'];
    $fileName = $_FILES['upload-file']['name'] ;
    $sql_insert_file ="INSERT INTO file_manager (file_name, file_link, type, size, product_id)
                        VALUES ('$file_name' , '$file_link', '$fileType', '$fileSize' ,'$product_id')";

    $result_insert = mysqli_query($con, $sql_insert_file);

    if ($result_insert) {
        echo "File uploaded successfully";
    }else {
        echo "Error: " . $sql_insert_file . "<br>" . $con->error;
    }
    console_log($_FILES['upload-file'][$file_name]);
    move_uploaded_file($_FILES["upload-file"]["tmp_name"], $target_file);
}
html_bottom();
# close connection
mysqli_close($con);
?>
