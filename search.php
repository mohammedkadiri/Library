// Check if the user has logged in else send the user back to login
<?php
if (isset($_SESSION['Username']) && isset($_SESSION['Password'])) {
}
else {
  header("Location: ./signup.php");
  exit();
}

include 'includes/dbh.inc.php';

  // Retrieve all values from fields
  $values = mysqli_real_escape_string($conn, $_GET['values']);
  $description = $_GET['Description'];

  // If the user has selected to search a book by description and not by author or title hence that field is empty
  if(isset($_GET['Description']) && empty($_GET['values'])){

      echo "Browse by ".$_GET['Description']."<br>";

    // $sql = "SELECT * FROM books WHERE Author LIKE '$values%' OR BookTitle LIKE '$values%'  LIMIT 5";
    $sql = "SELECT *, CategoryDescription FROM books join category on books.CategoryID = category.CategoryID WHERE CategoryDescription = '$description' LIMIT 5";

    // Query database with sql statement
    $result = $conn -> query($sql);

    // Retrieve the rows from the database
    if ($result -> num_rows > 0) {
      echo '<br/> <table><tr><th>ISBN</th><th>BookTitle</th><th>Author</th><th>Edition</th><th>Year</th><th>CategoryDescription</th><th>Reservation</th></tr>';
      
      // Create an associative array from the retrieved rows and use key value pairs to retrieve information from each column in a row
      while ($row = $result -> fetch_assoc()) {
        echo '<tr>'.'<td class="table-list">'.$row['ISBN'].'</td>'.'<td class="table-list">'.$row['BookTitle'].'</td>'.'<td class="table-list">'.$row['Author'].'</td>'
        .'<td style="padding-left:2.5%;color:#808080;padding-top: 1%;
          padding-bottom:3.5%;">'.$row['Edition'].'</td>'.'<td style="padding-left:1.7%;color:#808080;padding-top: 1%;
          padding-bottom:3.5%;">'.$row['Year'].'</td>'.'<td style="padding-left:7%;color:#808080;padding-top: 1%;
            padding-bottom:3.5%;">'.$row['CategoryDescription']
        .'</td>'.'<td class="table-list">'.$row['Reservation'].'</td>'.'<td><a class="reserve-btn"href="reservation.php?'.'isbn='.$row['ISBN'].'">Reserve</a></td><tr><br>';

      }
      echo '</table>';
    }
  }
// If the user wants to search a book by title or author
  else if (isset($_GET['values'])) {

    echo "<span>Browse by </span>'".$_GET['values']."' <span>in ".$_GET['search']."</span><br>";

    $sql = "";
    $temp = $_GET['search'];
    // $sql = "SELECT * FROM books WHERE Author LIKE '$values%' OR BookTitle LIKE '$values%'  LIMIT 5";
    if( $temp == 'book title')
    {
        $sql = "SELECT *, CategoryDescription FROM books join category on books.CategoryID = category.CategoryID WHERE BookTitle LIKE '$values%'  LIMIT 5";
    }
    else {
          $sql = "SELECT *, CategoryDescription FROM books join category on books.CategoryID = category.CategoryID WHERE Author LIKE '$values%'  LIMIT 5";
    }


    $result = $conn -> query($sql);

    if ($result -> num_rows > 0) {
      echo '<br/> <table><tr><th>ISBN</th><th>BookTitle</th><th>Author</th><th>Edition</th><th>Year</th><th>CategoryDescription</th><th>Reservation</th></tr>';
      while ($row = $result -> fetch_assoc()) {
        echo '<tr>'.'<td class="table-list">'.$row['ISBN'].'</td>'.'<td class="table-list">'.$row['BookTitle'].'</td>'.'<td class="table-list">'.$row['Author'].'</td>'
        .'<td style="padding-left:2.5%;color:#808080;padding-top: 1%;
          padding-bottom:3.5%;">'.$row['Edition'].'</td>'.'<td style="padding-left:1.7%;color:#808080;padding-top: 1%;
          padding-bottom:3.5%;">'.$row['Year'].'</td>'.'<td style="padding-left:7%;color:#808080;padding-top: 1%;
            padding-bottom:3.5%;">'.$row['CategoryDescription']
        .'</td>'.'<td class="table-list">'.$row['Reservation'].'</td>'.'<td><a class="reserve-btn"href="reservation.php?'.'isbn='.$row['ISBN'].'">Reserve</a></td><tr><br>';

      }
      echo '</table>';
    }
  }

 ?>
