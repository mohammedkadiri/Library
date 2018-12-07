// Create the dropdown list from the category description in the database
<?php
  require_once 'includes/dbh.inc.php';
  echo '<select name="Description">';
  $result = mysqli_query($conn, "SELECT CategoryDescription FROM category");
  while ($row = mysqli_fetch_row($result)) {
    echo "<option value=" . $row[0]. ">";
    echo($row[0]);
  }
  echo '</select>';
  mysqli_close($conn);
 ?>
