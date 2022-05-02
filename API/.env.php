<?php
// .env.example.php
define('DB_SERVER', 'localhost');
define('DATABASE', 'equipment');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'HelloWorld617!');

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
