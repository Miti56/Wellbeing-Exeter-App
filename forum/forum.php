<?php 
    include 'nav-bar.php';
    include 'connect.php';

    $forum_id = $_GET['forum_id'];
    
    $get_posts = "SELECT * FROM Forum.Forum_Posts WHERE forum_id='$forum_id' ORDER BY postID DESC";
    $posts = $conn->query($get_posts);

    $get_forum_title = "SELECT * FROM Forum.Forums WHERE forum_id='$forum_id'";
    $title = $conn->query($get_forum_title);

    if (isset($_GET['search-query'])) {
        $search_query = $_GET['search-query'];
        $search_forum = "SELECT * from Forum.Forum_Posts WHERE forum_id='$forum_id' AND (post_title LIKE '%$search_query%' OR post_content LIKE '%$search_query%')";
        $search_results = $conn->query($search_forum);
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forums</title>
    <link rel="stylesheet" href="/stylesheet.css">
</head>

<body>

<!--get title of forum from database-->
<? $result = $title->fetch_assoc() ?>
<h1><? echo $result['forum_title'] ?></h1>


<!--add new post-->
<div class="new-post">
<form action="/add-post.php" method="post">
    <input type="hidden" name="forum_id" value="<? echo $forum_id ?>">
    <input type="submit" value="+ New Post" class="button">
</form>
</div>

<!--sort posts-->
<label for="sort-posts">Sort Posts By</label>

<select name="sort" id="sort-posts">
    <option value="new">NEW</option>
    <option value="old">OLD</option>
    <option value="top">TOP</option>
</select>

<!--search forum-->
<form method="get">
    <input type="hidden" value="<? echo $forum_id ?>" name="forum_id">
    <input class="searchbar" type="text" autocomplete="off" name="search-query" placeholder="Search Forum">
    <input type="submit" class="search-button" value="Search">
</form>

<!--posts-->

<?php

    if (isset($search_query)) {
        echo "<h3>Results from search '".$search_query."'.</h3>";
        while($post = $search_results->fetch_assoc()) { ?>
            <div class="forum-post">
                <div class="user-profile-forum">
                    <!--user profile picture and name-->
                    <img class="forum-profile-photo" src="/profile-picture-test.png"><br>
                    <p class="forum-user-name">By <a class="forum-link-to-user" href=$profile_link>Name Name</a></p>
                </div>
                <!--title/subject-->
                <h4 class="post-title"><? echo $post['post_title'] ?></h4>
                <!--preview of post? first line?-->
                <p class="content-preview"><? echo $post['post_content'] ?></p>
                <!--also show number of likes-->
            </div>   
    <? }
    } else {
        while($post = $posts->fetch_assoc()) { ?>
            <div class="forum-post">
                <div class=user-profile-forum">
                    <!--user profile picture and name-->
                    <img class="forum-profile-photo" src="/profile-picture-test.png"><br>
                    <p class="forum-user-name">By <a class="forum-link-to-user" href=$profile_link>Name Name</a></p>
                </div>
                <!--title/subject-->
                <h4 class="post-title"><? echo $post['post_title'] ?></h4>
                <!--preview of post? first line?-->
                <p class="content-preview"><? echo $post['post_content'] ?></p>
                <!--also show number of likes-->
            </div> 
   <? } }?>

</body>

</html>