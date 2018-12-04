<?php
include 'dbh.inc.php';

  // Retrieve all values from fields
  $username =  $_SESSION['Username'];
  $unreserve = 'N';

  if(isset($_POST['view'])) {
    $sql = "SELECT *, BookTitle, Author FROM reservations join books on reservations.ISBN = books.ISBN WHERE Username = '$username' ";

    $result = $conn -> query($sql);

    if ($result -> num_rows > 0) {
        echo "Books Reserved by: &nbsp".$username."<br><br><br><br><br><br>";
      while ($row = $result -> fetch_assoc()) {
        echo  $row['BookTitle']. " , by  ".$row['Author']. " reserved on ".$row['ReservedDate'].'<a class="reserve-btn"href="viewReserved.php?'.'isbn='.$row['ISBN'].'">Remove</a>';
        echo "<br><br>";
      }
    }
  }

  if(isset($_GET['isbn'])) {
      $isbn = $_GET['isbn'];
      $sql = "DELETE FROM reservations WHERE ISBN = '$isbn' AND Username = '$username';";
      $sql .= "UPDATE books set Reservation = '$unreserve' WHERE ISBN = '$isbn'";
      if (mysqli_multi_query($conn, $sql))
      {
            echo "<br><br>Removed book reservation";
      }

  }

 ?>
