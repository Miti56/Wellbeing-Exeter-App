<?php
define('username',"root");
//Add password here
define('password', "");
define('dbname', "schema_name");

$conn = new mysqli("localhost", username, password, dbname, 3306);
if ($conn->connect_error) {
    die("Error connecting to database " . $conn->connect_error);
}

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['file']['tmp_name']));
        $imageProperties = getimageSize($_FILES['file']['tmp_name']);
        $imageType = $imageProperties['mime'];

        $sql = "UPDATE schema_name.profileinfo SET profilePicture = '$imgData', imageType = '$imageType' WHERE userID = 1";
        $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
    }
}

print_r($_POST);
$sql = "UPDATE schema_name.profileinfo 
        SET fullName = ?, email = ?, facebookLink = ?, twitterLink = ?, instagramLink = ?, 
            totalPointsPublic = ?, treasurePointsPublic = ?, streakPublic = ?
        WHERE userID = 1";
$update = $conn->prepare($sql);
$uid = 1;

$showTotalPoints = isset($_POST['showRankings']) ? 1 : 0;
$showTreasurePoints = isset($_POST['showTreasure']) ? 1 : 0;
$showStreak = isset($_POST['showStreak']) ? 1 : 0;

$update->bind_param('sssssiii', $_POST['profileName'], $_POST['profileEmail'],
                    $_POST['linkFacebook'], $_POST['linkTwitter'], $_POST['linkInstagram'],
                    $showTotalPoints, $showTreasurePoints, $showStreak);
$update->execute();

header('Location: profileView.php');

