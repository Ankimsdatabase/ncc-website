<?php
define('UPLOAD_PATH', $_SERVER['DOCUMENT_ROOT'] . '/public/images/');

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "main_ncc";

// Create Connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check Connection
if ($conn->connect_error) {
    die("connection failed");
}
