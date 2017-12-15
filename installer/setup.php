<?php
echo "PHP-forum v0.1 installer - Database setup";

$database = include('conf/database.php');
$conn = new mysqli($database['host'], $database['user'], $database['pass']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connection to MySQL opened";

echo "Creating database \"phpf\"";
$sql1 = "CREATE DATABASE phpf";
if ($conn->query($sql1) === TRUE) {
    echo "Database \"phpf\" created successfully";
} else {
    echo "Error creating database: " . $conn->error;
    die("Installer stopped");
}

echo "Creating table \"members\"";
$sql2 = "CREATE TABLE members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(30) NOT NULL,
    realname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    passwd VARCHAR(50),
    reg_date TIMESTAMP
    )";
    
    if ($conn->query($sql2) === TRUE) {
        echo "Table \"members\" created";
    } else {
        echo "Error creating table: " . $conn->error;
        die("Installer stopped");
    }

    echo "Creating table \"site\"";
    $sql3 = "CREATE TABLE site (
        sitename VARCHAR(30) NOT NULL,
        realname VARCHAR(30) NOT NULL,
        reg_date TIMESTAMP
        )";
        
        if ($conn->query($sql3) === TRUE) {
            echo "Table \"site\" created";

            echo "Installer finished";
            echo "Run \"settings.php\" next";
        } else {
            echo "Error creating table: " . $conn->error;
            die("Installer stopped");
        }
?>
