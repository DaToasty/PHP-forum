<?php

$database = include('conf/database.php');
$conn = new mysqli($database['host'], $database['user'], $database['pass'], "phpf");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT sitename FROM site";
$result = $conn->query($sql);
$wname = $result->fetch_assoc();

require("styles/Default/index.php");

?>
