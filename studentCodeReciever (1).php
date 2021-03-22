<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    ?>
<head>
    <link rel="shortcut icon" href="https://cdn.iconscout.com/icon/premium/png-256-thumb/agenda-1765355-1501923.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter New Code</title>
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
<div class="container">
    <h1>Enter Code To Recieve Points</h1>
    <form method="post">
        <label for="code"><b>Code</b></label><br>
        <div class="email">
            <input type="text" placeholder="Enter Your Generated Code For Points!" name="code" id="code" required>
        </div>
        <input class="enter" type="submit" name="enterCode" value="Enter Code">
    </form>
    <?php
    // Change this to your connection info.
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'id16152105_root';
    $DATABASE_PASS = 'UniversityExeter56?';
    $DATABASE_NAME = 'id16152105_usernames';
    // Try and connect using the info above.
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    if ( mysqli_connect_errno() ) {
        // If there is an error with the connection, stop the script and display the error.
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    $userID = '1'; //dummy value
    if(isset($_POST['code'])){
        $search = $_POST['code']; //recieves code (will need a validation
        
        $code = "SELECT points FROM `code` WHERE `code`='$search'"; //knows how many points it's worth
        $result = mysqli_query($code) or die (mysqli_error());
    
        if($result)
        {
            while($row=mysqli_fetch_row($result))
            {
                //total user points
                $points = "SELECT points FROM `pointcodes` WHERE `code`='$search'"; //knows how many points it's worth
                $subject = "SELECT eventName FROM `pointcodes` WHERE `code`='$search'"; //knows subject points belong to
                $query = "(UPDATE `leaderboard` SET `points` = `points` + $points WHERE `userid` = $userID AND subject = 'Total_Points') , (UPDATE `leaderboard` SET `points` = `points` + $points WHERE `userid` = $userID AND `subject` = $subject)";
                mysqli_query($con, $query);
            }
        }
        else
        {
            echo "No result";
        }

    }

    ?>
   <!-- <a class="l1" href="studentHome.html">Back</a> --><!-- will come back toi this when student home is made -->
</div>
</body>
</html>
