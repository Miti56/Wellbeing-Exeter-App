<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'id16152105_root';
$DATABASE_PASS = 'UniversityExeter56?';
$DATABASE_NAME = 'id16152105_usernames';

// Try and connect using the info above.
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Find the user ID based on the login information (probably just using cookies).
$sql = "SELECT * FROM profileinfo WHERE (userID = 1)";
$result = $conn->query($sql);

if ($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
} else {
    $conn->error = "Error executing" . $sql . "<br>" . $this->error;
}
//$conn->close();
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styleprofile.css">
    <!-- Used to import the show/hide password eye-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
<div style="text-align: center;">
    <div class="header">
        <h1>My Profile</h1>
    </div>
    <form action="editProfile.php">
        <input type="submit" value="Change Settings" />
    </form>
    <div class="wrapper">
        <div class="picture">
            <img src="<?php echo $row['profilePicture']?>" height = "100" width="100">
        </div>
        <div class = "name">
            <h2><?php echo $row["fullName"]?></h2>
        </div>
        <!-- Display the meaning of each picture on hover
            (Star = All Points, Map = Treasure Hunt, Fire = Streak) -->
        <div class="points"></div>
        <i class="fa fa-star" style="font-size:32px;color:#FEE12B"></i><?php echo $row["totalPoints"];?>
        <!-- Show the total number of points -->
        <i class="fas fa-briefcase" style="font-size:32px;color:#3F301D"></i><?php echo $row["treasureHuntPoints"];?>
        <!-- Show the treasure hunt points -->
        <i class="fa fa-fire-alt" style="font-size:32px;color:#DD571C"></i> <?php echo $row["streak"];?>
        <!-- If we aren't doing streaks, just delete this part ^^ -->
    </div>
    <div class="social_media">
        <ul>
            <li><a href=<?php echo $row["facebookLink"]?>><i class="fab fa-facebook-f"></i></a></li>
            <li><a href=<?php echo $row["twitterLink"]?>><i class="fab fa-twitter"></i></a></li>
            <li><a href=<?php echo $row["instagramLink"]?>><i class="fab fa-instagram"></i></a></li>
        </ul>
    </div>
    <div class="rankings">
        <h3>Current Rankings</h3>
        <table class="rankingTable" style="margin-left:auto;margin-right:auto">
            <?php
            $userID = '1';
            // run the query. Will return a resource or false
            $subj_find = "SELECT subject FROM leaderboard WHERE userid = '$userID'";
            $result_b = mysqli_query($conn,$subj_find);

            // if it ran OK
            if ($result_b) {
            // while I have more results, loop through them
            // returning each result as an array
	
            while ($subject = mysqli_fetch_array($result_b)) {
            // use the array keys (column names) to output the data
            ?>
            <td>
                <?php
				$_SESSION['subject'] = $subject["subject"];
                echo $subject["subject"];
                ?>
            </td>
            <td>
            <button onclick="location.href='/app/leaderboard.php'">Go To</button></td>
            <?php
            }
            }
            ?>"
        </table>
    </div>
</div>
</body>
</html>
