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
    echo "user doesn't exist";
}

$conn->close();
?>

<html>
<head
<link rel="stylesheet" type="text/css" href="stylelogin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
<div style="text-align: center;">
    <div class="header">
        <h1>User Settings</h1>
    </div>
    <form method="POST" enctype="multipart/form-data" action=updateDetails.php onsubmit="return validation()">
        <div>
            <label for="profileName"><b>Name</b></label>
            <input type="text" value = "<?php echo $row['fullName']?>" name="profileName" id = "profileName">
        </div>
        <div>
            <label for="profileEmail"><b>Email</b></label>
            <input type="text" value = "<?php echo $row['email']?>" name="profileEmail" id = "profileEmail" >
        </div>
        <div class="upload">
            <input type="file" accept="image/*" name="file" id="file" onchange="loadFile(event)" style="display: none;"></p>
            <p><label for="file" style="cursor: pointer;">Edit Profile Picture</label></p>
            <?php if ($row["imageType"] == NULL)
            {
                echo '<img id="profileImage" src="http://groupxcourseworkexeter.online/app/profile-picture-test.png" height="100" width="100">';
            } else {
                $userID = $row['userID'];
                echo '<img id="profileImage" src="displayPFP.php?image_id=' . $userID . '" height = "100" width="100">';
            }?>
        <p><label for="profileImage">Please ensure your profile picture is less than <b>64kb</b></label></p>
        </div>
        <div class="security">
            <b>Security and Privacy</b><br>
            <label for="showRankings" id="test">Display my total points</label>
            <?php if($row['totalPointsPublic'] == 1) {
                echo "<input type = 'checkbox' id = 'showRankings' name ='showRankings' checked><br>";
            } else {
                echo "<input type = 'checkbox' id = 'showRankings' name ='showRankings'><br>";
            }?>
            <label for="showStreak">Display my treasure hunt points</label>
            <?php if($row['treasurePointsPublic'] == 1) {
                echo "<input type='checkbox' id='showTreasure' name='showTreasure' checked><br>";
            } else {
                echo "<input type='checkbox' id='showTreasure' name='showTreasure'><br>";
            }?>
            <label for="showStreak">Display my streak</label>
            <?php if($row['streakPublic'] == 1) {
                echo "<input type='checkbox' id='showStreak' name='showStreak' checked><br>";
            } else {
                echo "<input type='checkbox' id='showStreak' name='showStreak'><br>";
            }?>
        </div>
        <div class="social">
            <br><b>Link your social media</b><br>
            <label for="linkFacebook"><b>Facebook</b></label>
            <i class="fab fa-facebook-f" style="color:blue"></i>
            <input type="text" name="linkFacebook" id = "linkFacebook" value = "<?php echo $row['facebookLink']?>"><br>
            <label for="linkTwitter"><b>Twitter</b></label>
            <i class="fab fa-twitter" style="color:lightskyblue"></i>
            <input type="text" name="linkTwitter" id = "linkTwitter" value = "<?php echo $row['twitterLink']?>"><br>
            <label for="linkInstagram"><b>Instagram</b></label>
            <i class="fab fa-instagram" style="color:#FC94AF"></i>
            <input type="text" name="linkInstagram" id = "linkInstagram" value = "<?php echo $row['instagramLink']?>"><br>
        </div>
        <div class="container">
            <input type="submit" name="submitChanges" value="Submit Changes">
        </div>
    </form>
    <button onclick="location.href='profileView.php';">Cancel Changes</button>
</div>
<script>
    var loadFile = function(event) {
        if (!(event.target.files[0]['type'].split('/')[0] === 'image'))
        {
            window.alert("Please ensure you only upload image files");
            document.getElementById('file').value = "";
            return;
        }
        var image = document.getElementById('profileImage')
        var imgsize = event.target.files[0].size/1024;
        if (imgsize > 64)
        {
            window.alert("Please ensure your image file is less than 64kb")
            document.getElementById('file').value = ""
            image.src = "displayPFP.php?image_id=<?php echo $row['userID']; ?>"
        } else {
            image.src = URL.createObjectURL(event.target.files[0])
        }
    };
</script>
</body>
</html>