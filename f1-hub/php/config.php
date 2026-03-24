<?php
// php/config.php


define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'password');           // <-- put your password here
define('DB_NAME', 'f1_hub');

function getDBConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("<p style='color:red; font-family:sans-serif; padding:2rem;'>
            Database Error: " . $conn->connect_error . "
            <br><br>Please check your password in php/config.php
        </p>");
    }
    $conn->set_charset('utf8mb4');
    return $conn;
}
?>
