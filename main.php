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
      <span class="open-slide">
        <a href="#" onclick="openSlideMenu()">
          <svg width="30" height="30">
            <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
            <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
            <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
          </svg>
        </a>
      </span>

      <ul class="navbar-nav">
        <li><a href="#">Home</a></li>
        <li><a href="#">Reserve</a></li>
        <li><a href="#">Search</a></li>
        <li><a href="#">View</a></li>
      </ul>
    </nav>

      <div id="side-menu" class="side-nav">
        <a href="#" class="btn-close" onclick="closeSideMenu()">&times;</a>
        <a href="#">Home</a>
        <a href="#">Reserve</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
      </div>

      <div id="main">
        <h1>Responsive side Menu</h1>
      </div>

  </body>
</html>
