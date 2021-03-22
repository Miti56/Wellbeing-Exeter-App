<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'emps-sql.ex.ac.uk';
$DATABASE_USER = 'ljt227';
$DATABASE_PASS = 'ljt227';
$DATABASE_NAME = 'usernames';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
//isset() will check if the data exists.
if ( !isset($_POST['eventType'], $_POST['eventName']) ) {
    // Could not get the data that should have been sent.
    exit('Please fill both the Event and Name fields!');
}
// REGISTER USER
$code = $_POST['code'];
$eventName = $_POST['eventName'] ;
$eventType = $_POST['eventType'] ;
$points = $_POST['points'] ;
$code=rand(100000,900000);;

//send values to SQL database with a query
//password will be mixed up and encripted with pepper and salt
$query = "INSERT INTO pointcodes (eventType, eventName, code, points) VALUES ( '$eventType', '$eventName', '$code','$points' )";
mysqli_query($con, $query);

header('Location: staffRandomNumber.php');
