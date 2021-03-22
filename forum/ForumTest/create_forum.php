<!-- PHP script to insert content to posting table (basically where all posts are gathered)  -->
<?php

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = mysqli_connect("localhost","root","root","forum");
    $errors = "";
    $testname = htmlspecialchars($_POST["testname"]);
    $title = htmlspecialchars($_POST["title"]);
    $post_desc = htmlspecialchars($_POST["desc"]);
    $public_opt = ($_POST['publicview']);

    if(empty($title) or empty($post_desc)){
      $errors = "Invalid Inputs!";
    }
    elseif(empty($course_opt)){
      $query = mysqli_query($conn, "INSERT INTO posting (poster, post_title, post_desc, public) VALUES ('$testname','$title','$post_desc',1);");
      if($query){
        header("Location: index.php");
      }
      else{
        echo "Aint workin m8!";
      }
    }
    else{
      $query = mysqli_query($conn, "INSERT INTO posting (poster, post_title, post_desc,public) VALUES ('$testname','$title','$post_desc',0);");
      if($query){
        header("Location: index.php");
      }
      else{
        echo "Aint workin m8!";
      }
    }
  }

?>

<!DOCTYPE html>

<html>
  <!-- Create Forum Page  -->
    <div class="container">
      <h1>Create a Forum</h1>
      <p>Please fill in this form to create your own Forum.<br><?php $errors; ?></p>

      <hr>
  <form method="post">
      <label for="testname"><b> Username(for testing)</b></label><br>
      <input type="text" placeholder="testname" name="testname" size="50" required>
      <br>
      <label for="title"><b>Title</b></label><br>
      <input type="text" placeholder="Title" name="title" size="50" required>
      <br>
      <label for="description"><b>Description</b></label><br>
      <textarea type="text" name="desc" size="50" cols="38" placeholder="Text" optional></textarea><br>
        <!-- Privacy options  -->
          <label for="privacy">Privacy Options</label><br>
          <input type="checkbox" name="publicview" value="public" checked>
          <label for="publicOption">
          <img src="img/public.jpg" width="25" height="25" alt="userIcon">
          Public</label><br>
          <div>
          Everyone is able to view and comment on this post.
          </div>
          <input type="checkbox" name="courseview" value="course">
          <label for="courseOption">
          <img src="img/lock.jpg" width="25" height="25" alt="userIcon">
          Course Only</label><br>
          <div>
          Only people who study similar modules as you can view and comment.
          </div>

      <div>
        <button type="submit" class="createforum">Create Forum</button>
      </div>
    </div>
  </form> 
  <button onclick="location.href= 'index.php'>Cancel</button>
</html>