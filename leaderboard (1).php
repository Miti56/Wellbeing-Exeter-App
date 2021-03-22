<html>
    <?php
    session_start();
    ?>
<head>
    <link rel="shortcut icon" href="https://cdn.iconscout.com/icon/premium/png-256-thumb/agenda-1765355-1501923.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="../assets/css/leaderboard.css" type="text/css" runat="server">
</head>
<body>
<div class="container">
    <?php 
    $subject = $_SESSION['subject'];
    ?>
    <h1><?php $subject ?> Leaderboard</h1>
    <table id="leaderboard">
        <tr>
            <th>Rank</th>
            <th>User</th>
            <th>Points</th>
        </tr>
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

// $result = mysqli_query("SELECT name, points FROM leaderboard ORDER BY points DESC");
$result = mysqli_query($con, "SELECT * FROM leaderboard WHERE subject='$subject' ORDER BY points DESC;");
$rank = 1;

if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$rank}</td>
              <td>{$row['name']}</td>
              <td>{$row['points']}</td></tr>";

        $rank++;
    }
}

?>

</table>
<?php session_destroy(); ?>
</html>