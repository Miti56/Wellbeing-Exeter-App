<?php
session_start();
define('username',"root");
//Add password here
define('password', "");
define('dbname', "schema_name");

$conn = new mysqli("localhost", username, password, dbname, 3306);
if ($conn->connect_error) {
    die("Error connecting to database " . $conn->connect_error);
}

if(isset($_GET['image_id'])) {
    $sql = "SELECT * FROM schema_name.profileinfo WHERE userID =" . $_GET['image_id'];
    $result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    header("Content-type: " . $row["imageType"]);
    echo $row["profilePicture"];
}
$conn->close();
