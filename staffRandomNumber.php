<!DOCTYPE html>
<html lang="en">
<head>
    <title>EXETER</title>
    <meta charset="UTF-8">
</head>
<body>

<form action="staffRandomNumberPHP.php" method="post" >
<div class="container">
    Subject/Society:<select name="eventName" id="eventName">
        <option value="COM">Computer Science</option>
        <option value="ENG">Engineering</option>
        <option value="MAT">Mathematics</option>
        <option value="PHY">Physics</option>
        <option value="PSY">Psychology</option>
        <option value="LAW">Law</option>
        <option value="ESH">English</option>
        <option value="MED">Medicine</option>
        <option value="BBS">Big Band Society</option>
        <option value="FBS">Football Society</option>
    </select>

    Event Type:<select name="eventType" id="eventType">
        <option value="Lecture">Lecture</option>
        <option value="Workshop">Workshop</option>
        <option value="Seminar">Seminar</option>
        <option value="ExtraReading">Extra Reading</option>
        <option value="SocMeeting">Society Meeting</option>
        <option value="SocEvent">Society Event</option>
    </select>

    <label for="points"><b>Points</b></label>
    <input type="text" placeholder="Enter Points" name="points" id="points" >


                    <a type="submit" name="login" value="LOGIN">
                        <button>Register</button>
                    </a>
</form>

</div>






</body>







