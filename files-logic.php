<?php
// connect to the database
include_once "components/nav_bar.php";
include_once "components/footer.php";
include_once ".env.php";
include_once "./components/template_html.php";


html_top("eyi617-ASE-Project", "/styles/dark.css");
// connect to the database
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
echo "File Uploaded Successfully";
echo $_POST['upload-file'];
console_log($_POST['upload-file']);
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO file_manager (name, size, downloads) VALUES ('$filename', $size, 0)";
            if (mysqli_query($con, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
html_bottom();
# close connection
mysqli_close($con);
?>
