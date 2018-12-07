<?php
  // Create variables to store the values which are need to connect to a specific database
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "library";

    // Create the connection
    $conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

    // If the connection failed display it 
    if(!$conn){
      die("Connection failed".mysqli_connect_error());
    }
 ?>
