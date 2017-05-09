<?php
include("includes/header.php");
include("includes/classes/User.php");
// session_destroy();

?>
    <form>
      <form class="post_form" action="index.php" method="POST">
        <textarea name="post_url" placeholder="Paste your url here"></textarea>
        <input type="submit" name="post" value="Post">
    </form>
  </body>
</html>
