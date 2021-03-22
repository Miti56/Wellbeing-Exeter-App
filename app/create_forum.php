<form style="border:1px solid #ccc">
  <div class="container">
    <h1>Create a Forum</h1>
    <p>Please fill in this form to create your own Forum.</p>
    <hr>

    <label for="title"><b>Title</b></label><br>
    <input type="text" placeholder="Title" name="title" size="50" required>
    <br>
    <label for="description"><b>Description</b></label><br>
    <textarea type="text" name="description" size="50" cols="38" placeholder="Text" optional></textarea><br>

    <form name="privacyOption">
        <label for="privacy">Privacy Options</label><br>
        <input type="checkbox" name="publicview" value="public" checked>
        <label for="publicOption">
        <img src="img/public.jpg" width="25" height="25" alt="userIcon">
         Public</label><br>
        <div>
        Everyone is able to view and comment on this forum.
        </div>
        <input type="checkbox" name="courseview" value="course">
        <label for="courseOption">
        <img src="img/lock.jpg" width="25" height="25" alt="userIcon">
        Course Only</label><br>
        <div>
        Only people who study similar modules as you can view and comment.
        </div>
        </label>
    </form>

    <div class="clearfix">
      <button type="button" class="cancelbutton">Cancel</button>
      <button type="submit" class="createforum" onclick="validateAndSend" href="create_forum.php">Create Forum</button>
    </div>
  </div>
</form> 