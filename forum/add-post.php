<?php
    include 'nav-bar.php';
    $forum_id = $_POST['forum_id'];
    //echo $forum_id;
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>

    <h1>Add Post</h1>

    <form id="add-post" method="post" action="add-post-to-db.php">
        <input type="hidden" name="forum_id" value=" <?echo $forum_id ?> ">
        <label>UserID (for testing)</label>
        <input type="text" class="forum-post-title" name="userID"><br>
        <label>Topic</label>
        <input type="text" class="forum-post-title" name="post-title">
        <textarea form="add-post" name="post-content"></textarea>
        <input type="submit" value="Add Post" class="button">
    </form>

    <?php

        //echo $forum_id;
    ?>



</body>
</html>
