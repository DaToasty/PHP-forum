<?php
$database = include('conf/database.php');
$conn = new mysqli($database['host'], $database['user'], $database['pass']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo("Connection to MySQL opened.");
?>
