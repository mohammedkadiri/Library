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
          <form action="#" method="post">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="text" name="fname" placeholder="Frstname">
            <input type="text" name="lname" placeholder="Lastname">
            <input type="text" name="address" placeholder="Address">
            <input type="text" name="city" placeholder="City">
            <input type="number" name="mobile" placeholder="mobile">
            <input type="number" name="telephone" placeholder="telephone">
            <button type="submit" name="signup-submit">Sign Up</button>
          </form>
          <a href="index.php" class="signup-link">Sign In&rarr;</a>
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
