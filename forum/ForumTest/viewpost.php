<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
	<!-- Show post content  -->
    <body>
        <?php
            $conn = mysqli_connect("localhost", "root", "root", "forum");
            $title = $_GET["title"];
            $query = mysqli_query($conn, "SELECT poster, post_title, post_desc FROM posting WHERE post_title='$title';");
            $data = mysqli_fetch_assoc($query);

            echo "<h1>".$data["post_title"]."</h1>";
            echo "<sup><b>Posted by ".$data["poster"]."</b></sup><br><hr>";
            echo "<p>".$data["post_desc"]."</p>";
        ?>
        <!-- Inserting Comment  -->
  		<div>
			  <form class="clearfix" method="post" id="comment_form">
			  <h4>Post a comment:</h4>
			  <textarea name="comment_text" class="form-control" cols="30" rows="3"></textarea>
			  <button class="btn btn-primary btn-sm pull-right" id="submit_comment">Submit comment</button>
			  </form>

			<!-- Display all comments on this post, CSS should look like smth like this https://gyazo.com/51c2c598ede86c37faafaad0699b567b -->
				<h2>Comments</h2>
				<hr>
				<?php
					$conn = mysqli_connect("localhost", "root", "root", "forum");
					$query = mysqli_query($conn, "SELECT uid, date, message FROM comments;");
					while($data = mysqli_fetch_assoc($query)) {
						echo "<b>".$data["uid"]."</b><small>".$data["date"]."</small><br>";
						echo "<p>".$data["message"]."</p>"; 
					}
        		?>	
			
		</div>
    </body>
</html>