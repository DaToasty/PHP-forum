<?php
echo "PHP-forum v0.1 installer - Database setup<br>";

$database = include('../conf/database.php');
$conn = new mysqli($database['host'], $database['user'], $database['pass']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connection to MySQL opened<br>";

echo "Creating database \"phpf\"<br>";
$sql = "CREATE DATABASE phpf";
if ($conn->query($sql) === TRUE) {
    echo "Database \"phpf\" created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
    die("Installer stopped");
}

mysqli_close($conn);
$conn = new mysqli($database['host'], $database['user'], $database['pass'], "phpf");

echo "Creating table \"members\"<br>";
$sql = "CREATE TABLE members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(30) NOT NULL,
    realname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    passwd VARCHAR(50),
    reg_date TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Table \"members\" created<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
        die("Installer stopped");
    }

    echo "Creating table \"site\"<br>";
    $sql = "CREATE TABLE site (
        sitename VARCHAR(30) NOT NULL,
        create_date TIMESTAMP
        )";
        
        if ($conn->query($sql) === TRUE) {
            echo "Table \"site\" created<br>";

            echo "Installer finished<br>";
            echo "Run \"settings.php\" next";
        } else {
            echo "Error creating table: " . $conn->error . "<br>";
            die("Installer stopped");
        }
?>
