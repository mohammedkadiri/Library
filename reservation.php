// Start the sessions to check if the user has actually logged in if not then send them back to login
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
    <div class="search-view">
      <div class="search-book">
        <form class="" action="#" method="get">
          <select name="search" class="list-book">
            <option value="isbn">By isbn</option>
          </select>
          <?php
            // Create an input field which gets the isbn value in the url from the main page if the user clicks the reserve button and then add isbn value inside the field automatically
            if (isset($_GET['isbn'])) {
              echo "<input type='text' name='values' value='". $_GET['isbn']."'class='search-box'>";
            }
            // Else the user never clicked on reserving a book using the reserve button
            else {
                echo "<input type='text' name='values' value='' class='search-box'>";
            }
           ?>
        </div>
        <button type="submit" name="browse" class="browse-btn">Browse</button>
        </form>
      </div>
      <div class="display-results">
        <hr>
          <?php
          // Add a button after the book has been displayed with the option to reserve that book
            if(isset($_GET['browse'])) {
            include 'includes/reservation.inc.php';
              echo "<br><br>";
              echo '<form class="" action="#" method="post">
                    <input type="submit" name="reserve" value="Reserve">
                    </form>';
             }?>
      </div>
  </body>
</html>
