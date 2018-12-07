// Start all the sessions then remove all the sessions variables stored both locally and on the server and redirect the user back to the index page to login
<?php
  session_start();
  session_unset();
  session_destroy();
  header("Location: ../index.php");
  exit();
 ?>
