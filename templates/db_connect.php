<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "myDB";

$errors = array();
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if (!$conn) {
  $errors[] = "Connection failed: " . mysqli_connect_error();
  $dbconnected = false;
} else {
  $dbconnected = true;
}
