<!DOCTYPE html>

<html>
    <!-- Forum main page  -->
    <head>
        <title>Forum</title>
    </head>
    <body>
        <h1>Forum</h1>
        <h2>Posts</h2>
        <button type="submit" onclick="location.href= 'create_forum.php'">Create new Post!</button>
        <!-- while loop to show all posts  -->
        <hr>
        <?php
            $conn = mysqli_connect("localhost", "root", "root", "forum");
            $query = mysqli_query($conn, "SELECT post_title, poster FROM posting;");
            while($data = mysqli_fetch_assoc($query)) {
                echo "<a href= 'viewpost.php?title=".$data["post_title"]."'>".$data["post_title"]."</a> <sub>by <b>".$data["poster"]."<br>";
            }
        ?>

    </body>
</html>