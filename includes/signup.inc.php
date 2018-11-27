<?php

    // Execute this statement if signup button has been clicked
    if(isset($_POST['signup-submit'])) {

      require 'dbh.inc.php';

      // Retrieve all values from fields
      $username  = mysqli_real_escape_string($conn, $_POST['uid']);
      $password  = mysqli_real_escape_string($conn, $_POST['pwd']);
      $passwordRepeat = mysqli_real_escape_string($conn, $_POST['pwd-repeat']);
      $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
      $lastname  = mysqli_real_escape_string($conn, $_POST['lname']);
      $address   = mysqli_real_escape_string($conn, $_POST['strname']);
      $town      = mysqli_real_escape_string($conn, $_POST['area']);
      $city      = mysqli_real_escape_string($conn, $_POST['city']);
      $mobile    = mysqli_real_escape_string($conn, $_POST['mobile']);
      $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);




      // Check if any fields are empty
      if (empty($username) || empty($password) || empty($passwordRepeat) || empty($firstname) || empty($lastname) || empty($address) || empty($town) || empty($city) || empty($mobile) || empty($telephone)) {
          header("Location: ../signup.php?error=Empty fields&uid=".$username."&fname=".$firstname."&lname=".$lastname."&strname=".$address."&area=".$town."&city=".$city."&mobile=".$mobile."&telephone=".$telephone);
          exit();
      }

      // Check for invalid Username
      else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
          header("Location: ../signup.php?error=Invalid Username&fname=".$firstname."&lname=".$lastname."&strname=".$address."&area=".$town."&city=".$city."&mobile=".$mobile."&telephone=".$telephone);
          exit();
      }

      // Check for invalid Firstname
      else if (!preg_match('/^([a-zA-Z]+[\'-]?[a-zA-Z]+[ ]?)+$/', $firstname)) {
          header("Location: ../signup.php?error=Invalid Firstname&uid=".$username."&lname=".$lastname."&strname=".$address."&area=".$town."&city=".$city."&mobile=".$mobile."&telephone=".$telephone);
          exit();
      }

      // Check for invalid Lastname
      else if (!preg_match('/^([a-zA-Z]+[\'-]?[a-zA-Z]+[ ]?)+$/', $lastname)) {
          header("Location: ../signup.php?error=Invalid Lastname&uid=".$username."&fname=".$firstname."&strname=".$address."&area=".$town."&city=".$city."&mobile=".$mobile."&telephone=".$telephone);
          exit();
      }

      // Check for both length Password
      else if(strlen($password) != 6) {
          if (strlen($password) < 6){
              header("Location: ../signup.php?error=(Password to short should be 6 characters)&uid=".$username."&fname=".$firstname."&strname=".$address."&area=".$town."&city=".$city."&mobile=".$mobile."&telephone=".$telephone);
              exit();
          }
          else{
              header("Location: ../signup.php?error=Password to long(Password should be 6 characters)&uid=".$username."&fname=".$firstname."&strname=".$address."&area=".$town."&city=".$city."&mobile=".$mobile."&telephone=".$telephone);
              exit();
          }
      }

      // Check for matching Password
      else if ($password !== $passwordRepeat) {
          header("Location: ../signup.php?error=Passwords do not match!&uid=".$username."&fname=".$firstname."&strname=".$address."&area=".$town."&city=".$city."&mobile=".$mobile."&telephone=".$telephone);
          exit();
      }

      // Check for length of Mobile number
      else if(strlen($mobile) != 10) {
          if (strlen($mobile) < 10) {
              header("Location: ../signup.php?error=Mobile number to short(Number should be 10 digits long)&uid=".$username."&fname=".$firstname."&strname=".$address."&area=".$town."&city=".$city."&telephone=".$telephone);
              exit();
          }
          else {
              header("Location: ../signup.php?error=Mobile number to long(Number should be 10 digits long)&uid=".$username."&fname=".$firstname."&strname=".$address."&area=".$town."&city=".$city."&telephone=".$telephone);
              exit();
          }
      }

      // Check if Mobile number is numeric
      else if(!ctype_digit($mobile)) {
          header("Location: ../signup.php?error=Invalid Number!&uid=".$username."&fname=".$firstname."&strname=".$address."&area=".$town."&city=".$city."&telephone=".$telephone);
          exit();
      }

      // Execute this statement if all fields are valid
      else {

          // Temporary placeholder to ensure security using prepared statements
          $sql = "SELECT Username FROM users WHERE Username=?";
          $stmt = mysqli_stmt_init($conn);

          if(!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../signup.php?error=sqlerror");
              exit();
          }
          // Check if the username is taken
          else {
              mysqli_stmt_bind_param($stmt, "s", $username);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_store_result($stmt);
              $resultCheck = mysqli_stmt_num_rows($stmt);
              if($resultCheck > 0) {
                  header("Location: ../signup.php?error=usernametaken&fname=".$firstname."&lname=".$lastname."&strname=".$address."&area=".$town."&city=".$city."&mobile=".$mobile."&telephone=".$telephone);
                  exit();
              }
              // Check if fields from user can be inserted the database
              else {
                  $sql = "INSERT INTO users(Username, Password, Firstname, Surname, AddressLine, Town, City, Mobile, Telephone) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
                  $stmt = mysqli_stmt_init($conn);
                  if(!mysqli_stmt_prepare($stmt,$sql)) {
                      header("Location: ../signup.php?error=sqlerror1");
                      exit();
                  }
                  // Hash the password and then insert the fields into the database
                  else {
                      // $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sssssssss", $username, $password, $firstname, $lastname, $address, $town, $city, $mobile, $telephone);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../signup.php?signup=success");
                        exit();
                  }
              }
          }
      }

      // Close the connections
      mysqli_stmt_close($stmt);
      mysqli_close($conn);

    }
    // If the user tries to bypass the signup button
    else {
        header("Location: ../signup.php");
        exit();
    }
 ?>
