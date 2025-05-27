<?php

session_start();
// require_once "components/checklogin.php";
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
  header("Location: /youbee-blog/login.php");

}
include "components/nav.php";



?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is demo page made for YouBee.ai's programming courses">
    <meta name="author" content="">

    <title>New post - YouBee Blog Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-blog-template.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->



    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Newpost content  -->
        <div class="col-lg-12 newpost">

          <!-- Title -->
          <h1>New post</h1>

          <!-- Newpost form -->
          <form action="actions/postAction.php" method="post" class="newpost-form">
            <div class="form-group">
              <label for="subject">title</label>

              <input type="text" id="subject" name="title" class="form-control">
            </div>

            <div class="form-group">
              <label for="content">Short description</label>
              <textarea rows="5" id="content" name="shortdesc" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <label for="content">long description</label>
              <textarea rows="5" id="content" name="longdesc" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Post</button>
          </form>

          <?php

if(isset($_GET['err'])){
  if($_GET['err']==1){
      echo "<p style='color: red'>Missing parameters</p>";
  }  if($_GET['err']==2){
      echo "<p style='color: red'>contact admistrateer</p>";
  }
 }
 ?>
          <!-- /form -->
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright &copy; YouBee Blog @2024</p>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
      </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



  </body>

</html>
