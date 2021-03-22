<?php
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
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/events.css">
</head>
<body>
<div class="container" id="container">
    <h2>University of Exeter Events</h2>
    <p>Here you will find all the events available for the university:</p>
    <div class="column1">
        <button onclick= switchContainer("container1") class="button1"><h3>Social Events</h3></button>
    </div>
    <div class="column2" >
        <button onclick= switchContainer("container2") class="button2"><h3>Special Events</h3></button>
    </div>
    <div class="column3" >
        <button onclick= switchContainer("container3") class="button3"><h3>Outdoor Events</h3></button>
    </div>
    <div class="column4" >
        <button onclick= switchContainer("container4") class="button4"><h3>Limited Events</h3></button>
    </div>
    <div class="backmain">
        <a class="mainback" href="events.php">Back</a>
    </div>
</div>
<div class="container1" id="container1">
    <h2>Social Events</h2>
    <?php
    $sql = "SELECT eventID , eventName, eventType, eventDescription FROM events WHERE eventType = 'Social'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br> Event ". $row["eventID"]. ":    " .$row["eventName"]. " <br>" . $row["eventDescription"] ." <br>";
        }
    } else {
        echo "0 results 1";
    }
    ?>
    <br>
    <a class="back" onclick = switchBack("container1") >Back</a>
</div>
<div class="container2" id="container2">
    <h2>Special Events</h2>
    <?php
    $sql2 = "SELECT eventID , eventName, eventType, eventDescription FROM events WHERE eventType = 'Special'";
    $result2 = $con->query($sql2);
    if ($result2->num_rows > 0) {
        // output data of each row
        while($row2 = $result2->fetch_assoc()) {
            echo "<br> Event ". $row2["eventID"]. ":    " .$row2["eventName"]. " <br>" . $row2["eventDescription"] ." <br>";
        }
    } else {
        echo "0 results 2";
    }
    ?>
    <br>
    <a class="back" onclick = switchBack("container2") >Back</a>
</div>
<div class="container3" id="container3">
    <h2>Outdoor Events</h2>
    <?php
    $sql3 = "SELECT eventID , eventName, eventType, eventDescription FROM events WHERE eventType = 'Outdoors'";
    $result3 = $con->query($sql3);
    if ($result3->num_rows > 0) {
        // output data of each row
        while($row3 = $result3->fetch_assoc()) {
            echo "<br> Event ". $row3["eventID"]. ":    " .$row3["eventName"]. " <br>" . $row3["eventDescription"] ." <br>";
        }
    } else {
        echo "0 results 3";
    }
    ?>
    <br>
    <a class="back" onclick = switchBack("container3") >Back</a>
</div>
<div class="container4" id="container4">
    <h2>Limited Events</h2>
    <?php
    $sql4 = "SELECT eventID , eventName, eventType, eventDescription FROM events WHERE eventType = 'Limited'";
    $result4 = $con->query($sql4);
    if ($result4->num_rows > 0) {
        // output data of each row
        while($row4 = $result4->fetch_assoc()) {
            echo "<br> Event ". $row4["eventID"]. ":    " .$row4["eventName"]. " <br>" . $row4["eventDescription"] ." <br>";
        }
    } else {
        echo "0 results 4";
    }
    $con->close();
    ?>
    <br>
    <a class="back" onclick = switchBack("container4") >Back</a>
</div>
<script>
    function switchContainer(containerID){
        document.getElementById(containerID).style.display="block";
        document.getElementById("container").style.display="none";
    }
    function switchBack(containerID){
        document.getElementById(containerID).style.display="none";
        document.getElementById("container").style.display="block";
    }
</script>
</body>
</html>

