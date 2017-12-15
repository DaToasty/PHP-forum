<?php

$database = include('../conf/database.php');
$conn = new mysqli($database['host'], $database['user'], $database['pass'], "phpf");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connection to MySQL opened<br>";

$webname = $_POST["wname"];
    $sql = "INSERT INTO site (sitename)
    VALUES ('$webname')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record \"wname\" created<br>";
        echo "Record \"wname\" set as \"$webname\"<br>";
        echo "";
        echo "Installer finished<br>";
        echo "Thanks for using PHP-forum! You can now continue to your <a href=\"../\">website</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
