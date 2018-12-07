<?php

  if (isset($_POST['login-submit'])) {

      // add the connection from the dbh.inc.php
      require 'dbh.inc.php';

      // Retrieve all values from fields
      $username  = mysqli_real_escape_string($conn, $_POST['uid']);
      $password  = mysqli_real_escape_string($conn, $_POST['pwd']);

      if (empty($username) || empty($password)) {
        header("Location: ../index.php?error=Empty Fields!");
        exit();
      }
      else {
        $sql = "SELECT * FROM users WHERE Username=? AND Password=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../index.php?error=sqlerror");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, "ss", $username,$password);
          mysqli_stmt_execute($stmt);

          $result = mysqli_stmt_get_result($stmt);
          if($row = mysqli_fetch_assoc($result)) {
            // $pwdCheck = password_verify($password, $row['Password']);
            // if($pwdCheck == false) {
            //   header("Location: ../index.php?error=Incorrect Password!");
            //   exit();
            session_start();
            $_SESSION['Username'] = $row['Username'];
            $_SESSION['Password'] = $row['Password'];


            header("Location: ../main.php?login=success");
            exit();
            // else if($pwdCheck == true) {
            //
            // }

          }
          else if(!$row = mysqli_fetch_assoc($result)){
                  header("Location: ../index.php?error=Incorrect Password or Username!");
            exit();
          }
          // else {
          //       header("Location: ../index.php?error=Incorrect Password");
          //   exit();
          // }

        }
      }

  }
  else {
    header("Location: ../index.php");
    exit();
  }
 ?>
