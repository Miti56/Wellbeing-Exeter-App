<?php
    $homelink = "";
    $forumlink = "";
    $leaderboardlink = "";
    $profilelink = "";
?>

<!DOCTYPE html>
<html>
   
<!--navigation bar-->
    <div class="nav-bar">

        <!--if current page is homepage link, set a class to active (for styling purposes)-->
        <a <?php if($_SERVER['SCRIPT_NAME']==$homelink) { ?>  
            class="active"   <?php   }  ?> 
            href=$homelink>Home</a>

        <!--if current page is forum page links, set a class to active (for styling purposes)-->
        <a <?php if($_SERVER['SCRIPT_NAME']==$forumlink) { ?>  
            class="active"   <?php   }  ?> 
            href=$forumlink>Forum</a>

        <!--if current page is leaderboard page links, set a class to active (for styling purposes)-->
        <a <?php if($_SERVER['SCRIPT_NAME']==$leaderboardlink) { ?>  
            class="active"   <?php   }  ?> 
            href=$leaderboardlink>Leaderboards</a>

        <!--if current page is profile link, set a class to active (for styling purposes)-->
        <a <?php if($_SERVER['SCRIPT_NAME']==$profilelink) { ?>  
            class="active"   <?php   }  ?> 
            href=$profilelink>Profile</a>

    </div>


</html>