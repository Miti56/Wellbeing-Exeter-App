<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'root';
$DATABASE_NAME = 'usernames';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
//isset() will check if the data exists.
if ( !isset($_POST['email'], $_POST['password']) ) {
    // Could not get the data that should have been sent.
    exit('Please fill both the email and password fields!');
}
// REGISTER USER
if ($stmt = $con->prepare('SELECT password FROM usernames WHERE email = ?')) {
    //Username is a string so "s"
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        header('Location: redirectLOGIN2.html');
    }  else {
        require "pepper.php";
        $username = $_POST['username'];
        $password = $_POST['password'] ;
        $email = $_POST['email'] ;
        $fname = $_POST['fname'] ;
        $lname = $_POST['lname'] ;
        $admincode = $_POST['code'] ;
        $typeuser = $_POST['typeuser'] ;
        $typeuser2 = $_POST['typeuser2'] ;
        $salt = bin2hex(openssl_random_pseudo_bytes(5));
        //send values to SQL database with a query
        //password will be mixed up and encripted with pepper and salt
            if ($typeuser == 'student'){
                $query = "INSERT INTO usernames ( password, salt, fname, lname, email, typeuser ) VALUES ('" . md5($password.$salt.pepper) . "', '$salt', '$fname', '$lname', '$email', '$typeuser')";
            } else {
                $query = "INSERT INTO usernames ( password, salt, fname, lname, email, typeuser, admincode ) VALUES ('" . md5($password.$salt.pepper) . "', '$salt', '$fname', '$lname', '$email', 'lecturer', '$admincode')";
            }

        mysqli_query($con, $query);

        header('Location: redirectLOGIN.html');
    }
}

