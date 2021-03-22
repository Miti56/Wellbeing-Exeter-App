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
            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                 alt="user" width="100">
        </div>
        <div class = "name">
            <h2>John Doe</h2>
        </div>
        <div class="points">
            <i class="fa fa-star" style="font-size:32px;color:#FEE12B"></i> 123
            <i class="fa fa-fire-alt" style="font-size:32px;color:#DD571C"></i> 123
        </div>
        <div class="social_media">
            <ul>
                <li><a href="https://en.wikipedia.org/wiki/Facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://en.wikipedia.org/wiki/Twitter"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://en.wikipedia.org/wiki/Instagram"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        <div class="rankings">
            <h3>Current Rankings</h3>
            <table class="rankingTable" style="margin-left:auto;margin-right:auto">
                <tr>
                    <td>#3</td>
                    <td>Stage 2 Computer Science</td>
                    <td><button onclick="location.href='https://en.wikipedia.org/wiki/Computer_science';">Go To</button></td>
                </tr>
                <tr>
                    <td>#29</td>
                    <td>History Society</td>
                    <td><button onclick="location.href='https://en.wikipedia.org/wiki/History';" value="Go to Google">Go To</button></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
