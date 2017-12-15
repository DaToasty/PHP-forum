<?php

echo "PHP-forum v0.1 ( Wipe website script )<br>";

$database = include('../conf/database.php');
$conn = new mysqli($database['host'], $database['user'], $database['pass'], "phpf");

$sql = "DROP DATABASE phpf";

if (mysqli_query($conn, $sql)) {
   echo "Website has been wiped<br>";
   mysqli_close($conn);
   die("Thanks for using PHP-forum!");
} else {
   echo "Error wiping website: " . mysqli_error($conn) . "<br>";
   die("Wipe stopped");
}

?>
