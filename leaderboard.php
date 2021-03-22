<html>
<head>
    <link rel="shortcut icon" href="https://cdn.iconscout.com/icon/premium/png-256-thumb/agenda-1765355-1501923.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="assets/css/leaderboard.css">
</head>
<body>
<div class="container">
    <h1>Leaderboard</h1>
    <table id="leaderboard">
        <tr>
            <th>Rank</th>
            <th>User</th>
            <th>Points</th>
        </tr>
<?php
/*
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'root';
$DATABASE_NAME = 'codeDB';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$result = mysqli_query("SELECT username, point FROM student ORDER BY point DESC");
$rank = 1;

if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<td>{$rank}</td>
              <td>{$row['user']}</td>
              <td>{$row['score']}</td>";

        $rank++;
    }
}
*/
?>

</table>
</html>