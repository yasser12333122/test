<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
  header("Location: /youbee-blog/login.php"); // khale be login
  exit; 
}
?>