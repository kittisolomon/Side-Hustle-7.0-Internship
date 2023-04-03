<?php

$db_con = mysqli_connect("localhost", "root", "", "sidehustle");

if (!$db_con) {

    die("Cannot connect to databse" . mysqli_error($db_con));

}

?>