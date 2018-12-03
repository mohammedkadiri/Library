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
      </ul>
    </nav>

    <div class="search-view">
      <div class="search-book">
        <form class="" action="#" method="get">
          <select name="search" class="list-book">
            <option value="book title">By book title</option>
            <option value="author">By author</option>
          </select>
          <input type="text" name="values" value="" class="search-box">
        </div>
        <button type="submit" name="browse" class="browse-btn">Browse</button>
        <?php require 'show.php'; ?>
        </form>
      </div>
  







  </body>
</html>
