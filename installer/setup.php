<?php
echo("PHP-forum v0.1 installer.");

$database = include('conf/database.php');
$conn = new mysqli($database['host'], $database['user'], $database['pass']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo("Connection to MySQL opened.");

$sql = "CREATE DATABASE phpf";
if ($conn->query($sql) === TRUE) {
    echo "Database \"phpf\" created successfully";
} else {
    echo "Error creating database: " . $conn->error;
    echo "Installer stopped."
    die();
}


?>
