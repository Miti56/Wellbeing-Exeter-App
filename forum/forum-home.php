<?php
    include 'nav-bar.php';
    include 'connect.php';

    if (isset($_GET['search-query'])) {
        $search_query = $_GET['search-query'];
        $search_forum = "SELECT * from Forum.Forums WHERE (forum_title LIKE '%$search_query%')";
        $search_results = $conn->query($search_forum);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forums</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>

    <h1>Forum</h1>

    <!--Search bar-->
    <form method="get">
    <input class="searchbar" type="text" autocomplete="off" name="search-query" placeholder="Search Forums">
    <input type="submit" class="search-button" value="Search">
</form>

<?php 
if (isset($search_query)) {
        echo "<h3>Results from search '".$search_query."'.</h3>";
        while($post = $search_results->fetch_assoc()) {
            echo '<form action="forum.php/" method="get">';
            echo '  <input type="submit" value="'.$post['forum_title'].'" class="forum-link">';
            echo '  <input type="hidden" value="'.$post['forum_id'].'" name="forum_id">';
            echo '</form>';    
         } 
    
        } else {
            ?>
                <!--For You-->
    <h3>For You</h3>

<?php 

    $get_forums = "SELECT * FROM Forum.Forums;";
    $forums = $conn->query($get_forums);


    while($forum = $forums->fetch_assoc()) {
        echo '<form action="forum.php/" method="get">';
        echo '  <input type="submit" value="'.$forum['forum_title'].'" class="forum-link">';
        echo '  <input type="hidden" value="'.$forum['forum_id'].'" name="forum_id">';
        echo '</form>';
    }
?>

<!--get suggested forum names from database script here-->

<!--Trending forums-->
<h3>Trending</h3>

<!--get trending forums script here-->

    <?    }
    ?>

</body>

</html>