<?php
    include_once "components/nav_bar.php";
    include_once "components/footer.php";
    include_once ".env.php";
    include_once "./components/template_html.php";



    html_top("eyi617-ASE-Project", "/styles/dark.css");
    // connect to the database
    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
    // check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if(!empty($_POST)){
        $device_id = $_POST['devices'];
        $manuf_id = $_POST['manufacturers'];
        setcookie("devices", $device_id, time() + (86400 * 30), "/");
        setcookie("manufacturers", $manuf_id, time() + (86400 * 30), "/");
    } else {
        $device_id = $_COOKIE['devices'];
        $manuf_id = $_COOKIE['manufacturers'];
    }
    $results_per_page = 1000;
    $sql = "SELECT COUNT(*) AS TOTAL FROM products WHERE device_id LIKE '$device_id'";
    $result =  mysqli_query($con, $sql);
    $number_of_result = mysqli_fetch_assoc($result);
    # if there are no results, return to index page
    if($number_of_result['TOTAL'] == 0){
        mysqli_close($con);
        header("Location: index.php");
    }
    $number_of_pages = ceil($number_of_result['TOTAL'] / $results_per_page);
    console_log($number_of_pages);
    //determine which page number visitor is currently on
    if (!isset($_GET['page']) ) {
        $page = 1;
    } else {
        $page = $_GET['page'];
        $current_page = $_GET['page'];
    }
    echo "<table class=\"table table-striped\" style='min-width: 1000px;'>
                <thead>
                    <th>Product ID</th>
                    <th>Device</th>
                    <th>Manufacturer</th>
                    <th>Serial Number</th>
                    <th>Status</th>
                </thead>
                <tbody>";
    $page_first_result = ($page-1) * $results_per_page;
    if (isset($_COOKIE['devices']) && $_COOKIE['manufacturers'] == "") {
        $sql = "SELECT * FROM products WHERE device_id LIKE '$device_id' LIMIT " . $page_first_result . ',' . $results_per_page;
        $result = mysqli_query($con, $sql);

        // check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $sql = "SELECT manufacturer FROM manufacturers WHERE auto_id = '$row[manufacturer_id]'";
                $result2 = mysqli_query($con, $sql);
                $sql = "SELECT device_type FROM devices WHERE auto_id = '$row[device_id]'";
                $result3 = mysqli_query($con, $sql);
                $manufacturer = mysqli_fetch_assoc($result2);
                $device_type = mysqli_fetch_assoc($result3);
                echo "<tr>
                    <td>" . $row['auto_id'] . "</td>
                    <td>" . $device_type['device_type'] . "</td>  
                    <td>" . $manufacturer['manufacturer'] . "</td>
                    <td>" . $row['SN'] . "</td>
               ";
                if ($row['is_active'] == 1) {
                    echo "<td>Active</td>";
                } else {
                    echo "<td>Inactive</td>";
                }
                echo "</tr>";
            }
        } else {
//                echo "0 results";
        }
    } elseif ($_COOKIE['devices'] == "" && (isset($_COOKIE['manufacturers']))) {
        $sql = "SELECT * FROM products WHERE manufacturer_id LIKE '$manuf_id' LIMIT " . $page_first_result . ',' . $results_per_page;
        $result = mysqli_query($con, $sql);
//        echo "<table class=\"table table-striped\">
//            <thead>
//                <th>Product ID</th>
//                <th>Device</th>
//                <th>Manufacturer</th>
//                <th>Serial Number</th>
//                <th>Status</th>
//            </thead>
//            <tbody>";
        // check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $sql = "SELECT manufacturer FROM manufacturers WHERE auto_id = '$row[manufacturer_id]'";
                $result2 = mysqli_query($con, $sql);
                $sql = "SELECT device_type FROM devices WHERE auto_id = '$row[device_id]'";
                $result3 = mysqli_query($con, $sql);
                $manufacturer = mysqli_fetch_assoc($result2);
                $device_type = mysqli_fetch_assoc($result3);
                echo "<tr>
                    <td>" . $row['auto_id'] . "</td>
                    <td>" . $device_type['device_type'] . "</td>  
                    <td>" . $manufacturer['manufacturer'] . "</td>
                    <td>" . $row['SN'] . "</td>
                  ";
                if ($row['is_active'] == 1) {
                    echo "<td>Active</td>";
                } else {
                    echo "<td>Inactive</td>";
                }
                echo "</tr>";
            }
        } else {
//                echo "0 results";
        }
    } else {
        $sql = "SELECT * FROM products WHERE manufacturer_id = '$manuf_id' AND device_id = '$device_id' LIMIT " . $page_first_result . ',' . $results_per_page;;
        $result = mysqli_query($con, $sql);
//        echo "<table class=\"table table-striped\">
//            <thead>
//                <th>Product ID</th>
//                <th>Device</th>
//                <th>Manufacturer</th>
//                <th>Serial Number</th>
//                <th>Status</th>
//            </thead>
//            <tbody>";
        // check if there are any results
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $sql = "SELECT manufacturer FROM manufacturers WHERE auto_id = '$row[manufacturer_id]'";
                $result2 = mysqli_query($con, $sql);
                $sql = "SELECT device_type FROM devices WHERE auto_id = '$row[device_id]'";
                $result3 = mysqli_query($con, $sql);
                $manufacturer = mysqli_fetch_assoc($result2);
                $device_type = mysqli_fetch_assoc($result3);
                echo "<tr>
                    <td>" . $row['auto_id'] . "</td>
                    <td>" . $device_type['device_type'] . "</td>  
                    <td>" . $manufacturer['manufacturer'] . "</td>
                    <td>" . $row['SN'] . "</td>
               ";
                if ($row['is_active'] == 1) {
                    echo "<td>Active</td>";
                } else {
                    echo "<td>Inactive</td>";
                }
                echo "</tr>";
            }

        }
    }

    echo "    </tbody>
                  </table>";
    ?>
<div id="outer" class="center-pagination">
    <div class="container" id="pagination-container">
        <nav aria-label="Page navigation example" style="min-width: 500px;">
            <ul class="pagination">
                <?php
                 if($page != 1) {
                        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"drop-down-result.php?page=" . ($current_page-1) . "\">Previous</a></li>";
                 } else {
                        echo "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"#\">Previous</a></li>";
                 }
                if($page >= ($number_of_pages-20)) {
                    for($page = $number_of_pages-20; $page<= $number_of_pages; $page++) {
                        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"drop-down-result.php?page=$page\">$page</a></li>";
                    }
                } else {
                    for($page = $current_page; $page<= $current_page+20; $page++) {
                        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"drop-down-result.php?page=$page\">$page</a></li>";
                    }
                }
                echo "<li class=\"page-item\"><a class=\"page-link\">...</a></li>";
                echo "<li class=\"page-item\"><a class=\"page-link\" href=\"drop-down-result.php?page=$number_of_pages\">$number_of_pages</a></li>";
                console_log($page);
                if($current_page < $number_of_pages) {
                    echo "<li class=\"page-item\"><a class=\"page-link\" href=\"drop-down-result.php?page=" . ($current_page+1) . "\">Next</a></li>";
                } else {
                    echo "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"drop-down-result.php?page=" . ($current_page+1) ."\">Next</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
</div>
<?php
// close the connection
mysqli_close($con);
html_bottom();
//    html_bottom();
//# function to select products where device is like device_id
//function select_devices($device_id) {
//    console_log("Function: " . $device_id);
//    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
//    $sql = "SELECT * FROM products WHERE device_id LIKE '$device_id';";
//    $result = mysqli_query($con, $sql);
//    return $result->fetch_all(MYSQLI_ASSOC);
//}
//# function to select products where manufacturer is like manufacturer_id
//function select_manufacturer($manufacturer_id) {
//    console_log($manufacturer_id);
//    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
//    $sql = "SELECT * FROM products WHERE manufacturer_id LIKE '$manufacturer_id';";
//    $result = mysqli_query($con, $sql);
//    return $result->fetch_all(MYSQLI_ASSOC);
//}
//# function to select products where manufacturer is like manufacturer_id and device is like device_id
//function select_both($manufacturer_id, $device_id) {
//    console_log($device_id);
//    console_log($manufacturer_id);
//    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
//    $sql = "SELECT * FROM products WHERE manufacturer_id = '$manufacturer_id' AND device_id = '$device_id';";
//    $result = mysqli_query($con, $sql);
//    return $result->fetch_all(MYSQLI_ASSOC);
//}
//#function to echo products
//function echo_products($products) {
//    echo "Selecting Products: 1-" . count($products) . "<br>";
//    foreach ($products as $row) {
//        echo "Product Selected: " . $row['SN'] . "<br>";
//    }
//}
// connect to the database
//$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
//// check connection
//if (!$con) {
//    die("Connection failed: " . mysqli_connect_error());
//}
//$device_id = $_POST['devices'];
//$manufacturer_id = $_POST['manufacturers'];
//console_log("Device: " . $device_id);
//console_log("Manufacturer: " . $manufacturer_id);
//if(!empty($_POST)){
//    if (isset($_POST['devices']) && $_POST['manufacturers'] == "") {
//        $device_id = $_POST['devices'];
//        $products = select_devices($device_id);
//    } elseif (isset($_POST['manufacturers']) && $_POST['devices'] == "") {
//        $manufacturer_id = $_POST['manufacturers'];
//        $products = select_manufacturer($manufacturer_id);
//    }
//    else {
//        $manufacturer_id = $_POST['manufacturers'];
//        $device_id = $_POST['devices'];
//        $products = select_both($device_id, $manufacturer_id);
//    }
//    echo_products($products);
//} else {
//    echo "Post is empty.";
//}
?>