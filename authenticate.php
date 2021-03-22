<?php
session_start();
// Change this to your connection info to respective server.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'root';
$DATABASE_NAME = 'usernames';
// Try and connect
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data from the login form was submitted
if ( !isset($_POST['email'], $_POST['password']) ) { //check if data exist with !isset
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
}
// Prepare our SQL, to prevent SQL injection
$name = $_POST['email'];
$pwd = $_POST['password'];
// Prepare our SQL, to prevent SQL injection
if ($stmt = $con->prepare('SELECT password FROM usernames WHERE email = ?')) {
    //Username is a string so we use "s"
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        $salt = bin2hex(openssl_random_pseudo_bytes(5));
        $query = "SELECT * from usernames WHERE username = '" . $name . "'";

        if (isset($name) and isset($pwd)) {
            require "connect.php";
            require "pepper.php";
            $connection = new mysqli(host, username, password, database, port);
            //encription and decription of password
            $salt = bin2hex(openssl_random_pseudo_bytes(5));
            $sql = "SELECT * from usernames WHERE email = '" . $name . "'";
            $result = $connection->query($sql);
            $user = $result->fetch_assoc();
            //compare if user's password equals one stored after descryption
            if (md5($pwd . $user["salt"] . pepper) === $user["password"]) {
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['email'];
                header('Location: home.html');
            } else {
                echo "wrong password";
            }

        }
    } else {
        header('Location: redirectCREATE.html');
    }
    $connection->close();
}
?>


