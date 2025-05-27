<?php
session_start();
if (isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) {
  header("Location: /youbee-blog/index.php"); // khale be login
  exit; 
}
?>