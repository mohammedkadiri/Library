<?php

$sql = "CREATE TABLE Users (\n"

    . "idUser int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,\n"

    . "Username TINYTEXT NOT NULL,\n"

    . "Password VARCHAR(6) NOT NULL,\n"

    . "Firstname TINYTEXT NOT NULL,\n"

    . "Surname TINYTEXT NOT NULL,\n"

    . "AddressLine LONGTEXT NOT NULL,\n"

    . "Town TINYTEXT NOT NULL,\n"

    . "City TINYTEXT NOT NULL,\n"

    . "Mobile INTEGER(10) NOT NULL,\n"

    . "Telephone INTEGER(10) NOT NULL\n"

    . ")";
?>
