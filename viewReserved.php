// Check if the person has logged in else send them back
<?php
  session_start();
  if (isset($_SESSION['Username']) && isset($_SESSION['Password'])) {
  }
  else {
    header("Location: ./signup.php");
    exit();
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/main.css?<?php echo time();?>">
    <script type="text/javascript" src="javascript\script.js">
    </script>
  </head>
  <body>
    <nav class="navbar">
      <ul class="navbar-nav">
        <li><a href="includes/logout.inc.php">Logout</a></li>
        <li><a href="reservation.php">Reservation</a></li>
        <li><a href="main.php">Main</a></li>
        <li><a href="viewReserved.php">ViewReservation</a></li>
      </ul>
    </nav>
    <br><br><br>
    <form class="" action="viewReserved.php" method="post">
          <input type="submit" name="view" value="view reserved">
      </form>
      <div class="display-results">
        <hr>
        <?php include 'includes/viewReserved.inc.php'; ?>
      </div>

  </body>
</html>
