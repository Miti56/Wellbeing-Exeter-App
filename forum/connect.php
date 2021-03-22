<?php
include 'db-credentials.php';
$conn = mysqli_connect('127.0.0.1:3306', $USER, $PASSWORD);
if (!$conn) {
    die('Could not connect: ');
}
//echo 'Connected successfully';
//echo "\n";
?>