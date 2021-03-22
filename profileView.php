<?php
session_start();
define('username',"root");
define('password', "Standrews22");
define('dbname', "schema_name");

$conn = new mysqli("localhost", username, password, dbname, 3306);
if ($conn->connect_error) {
    die("Error connecting to database " . $conn->connect_error);
}

// Find the user ID based on the login information (probably just using cookies).
$sql = "SELECT * FROM schema_name.profileinfo WHERE (userID = 2)";
$result = $conn->query($sql);

if ($result->num_rows == 1)
{
    $row = $result->fetch_assoc();
} else {
    $addToDBsql = "INSERT INTO schema_name.profileinfo (userID, fullName, email, treasureHuntPoints, 
                         streak, totalPointsPublic, treasurePointsPublic, streakPublic) 
                    VALUES ('2', 'Test', 'best','0','0','0','0','0')";
    mysqli_query($conn, $addToDBsql);
}
$conn->close();
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
            <?php if ($row["imageType"] == NULL)
            {
                echo '<img src="http://groupxcourseworkexeter.online/app/profile-picture-test.png" height="100" width="100">';
            } else {
                $userID = $row['userID'];
                echo '<img src="displayPFP.php?image_id=' . $userID . '" height = "100" width="100">';
            }?>
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
            <tr>
                <td></td>
                <td>Maths</td>
                <td><button onclick="location.href='https://en.wikipedia.org/wiki/Computer_science';">Go To</button></td>
            </tr>
            <tr>
                <td></td>
                <td>Baseball</td>
                <td><button onclick="location.href='https://en.wikipedia.org/wiki/History';" value="Go to Google">Go To</button></td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>