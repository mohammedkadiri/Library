 <!--Start the sessions to check if the user has actually logged in-->
<?php
  session_start();
  session_unset();
  session_destroy();
  header("Location: ../index.php");
  exit();
 ?>
