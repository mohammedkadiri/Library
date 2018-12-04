<?php


  include 'dbh.inc.php';

  // Retrieve all values from fields
  $values = mysqli_real_escape_string($conn, $_GET['values']);
  $reserve = 'Y';
  $username =  $_SESSION['Username'];
  $currentDate = date('Y-m-d');


  if (isset($values)) {

    $sql = "SELECT *, CategoryDescription FROM books join category on books.CategoryID = category.CategoryID WHERE ISBN = '$values' ";


    $result = $conn -> query($sql);

    if ($result -> num_rows > 0) {
        echo "<br><br><br><br><br><br>";
      while ($row = $result -> fetch_assoc()) {
        echo  "&nbsp&nbsp&nbsp<span>ISBN</span>&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp".$row['ISBN'];
        echo  "<br><br><br>&nbsp&nbsp&nbsp<span>BookTitle</span>&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp".$row['BookTitle'];
        echo  "<br><br><br>&nbsp&nbsp&nbsp<span>Author</span>&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp".$row['Author'];
        echo  "<br><br><br>&nbsp&nbsp&nbsp<span>Edition</span>&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp".$row['Edition'];
        echo  "<br><br><br>&nbsp&nbsp&nbsp<span>Year</span>&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp".$row['Year'];
        echo  "<br><br><br>&nbsp&nbsp&nbsp<span>CategoryDescription</span>&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp".$row['CategoryDescription'];

      }
    }
  }

  if(isset($_POST['reserve'])) {
    $sql = "SELECT Reservation FROM books WHERE ISBN = '$values' ";
    $result = $conn -> query($sql);
    if ($result -> num_rows > 0) {
      while ($row = $result -> fetch_assoc()) {
          if($row['Reservation'] == 'Y') {
              echo "<br><br>Sorry the book has already been reserved!";
          }
          else{
            $sql = "UPDATE books set Reservation = '$reserve' WHERE ISBN = '$values';";
            $sql .= "INSERT INTO reservations(ISBN, Username, ReservedDate) VALUES ('$values', '$username', '$currentDate')";
            if (mysqli_multi_query($conn, $sql))
            {
                  echo "<br><br>Book reservation succesfull";
            }

          }


      }
    }

  }

 ?>
