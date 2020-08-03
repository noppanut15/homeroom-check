<?php
include 'config.php';


function conn($host, $username, $password, $database)
{
    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $conn -> set_charset("utf8");
}
