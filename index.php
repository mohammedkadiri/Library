<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is a library website">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css?<?php echo time();?>">
    <title>Hidden Leaf Library</title>
  </head>
  <body class="index-bg">
    <div class="header"><h1>Library</h1></div>
      <div class="wrapper">
        <div class="book-container">
          <img src="images/books.jpg" alt="books">
        </div>
        <div class="login-form">
          <h3>Login</h3>
          <!--Get the error message which was encountered when error checking-->
          <?php
              if(isset($_GET['error'])) {
                echo "<p>" .$_GET['error']."</p>";
              }
           ?>
           <!--Create a form for the login page and send the value inside the fields to login.inc.php -->
          <form action="includes/login.inc.php" method="post">
            <p class="titles">Username</p>
            <input type="text" name="uid" placeholder="username">
            <br>
            <p class="titles">Password</p>
            <input type="password" name="pwd" placeholder="password">
            <br>
            <button type="submit" name="login-submit">Sign In</button>
          </form>
          <a href="signup.php" class="signup-link">Sign Up &rarr;</a>
        </div>
        <div class="form-container">
            <img src="images/mix.png"  alt="books">
        </div>
        <div class="left-container">
          <img src="images/divergent.png" class="divergent" alt="divergent-book">
        </div>
        <div class="right-container">
            <img src="images/phoneix.png" class="phoneix" alt="books">
        </div>
        <div class="bottom-container">
              <img src="images/geek.png" class="btm-img-1" alt="books">
              <img src="images/fiction.png" class="btm-img-2" alt="books">
                <img src="images/gameofthrones.jpg" class="btm-img-3" alt="books">
        </div>
      </div>
<?php include "footer.php" ?>
