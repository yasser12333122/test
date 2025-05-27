<!DOCTYPE html>
<html lang="en">

<?php 
include "components/nav.php";
require_once "components/chechnotlogin.php";
?>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is demo page made for YouBee.ai's programming courses">
    <meta name="author" content="YouBee.ai">

    <title>Sign up -  Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-blog-template.css" rel="stylesheet">

  </head>

  <body>

    


    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-2"></div>

        <!-- Signup content  -->
        <div class="col-lg-8 signup">

          <!-- Title -->
          <h1>Sign up</h1>

          <!-- Login form -->
          <form action="actions/registerAction.php" method="POSt" class="signup-form">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" id="username" name="username" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="password">Password Confirmation</label>
              <input type="password" id="confirmation" name="password_confirmation" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="username">Email</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
          </form>

?<?php
          if(isset($_GET['err'])){
    if($_GET['err']==1){
        echo "<p style='color: red'>Missing parameters</p>";
    }  if($_GET['err']==2){
        echo "<p style='color: red'>Email already in use</p>";

   }if($_GET['err']== 3){
    echo "<p style='color: red'>Email not valid </p>";

}if($_GET['err']== 4){
    echo "<p style='color: red'>password shoulb be more than 8 charchters</p>";

}
   }
   ?>
          <!-- /form -->
        </div>

        <div class="col-lg-2"></div>

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
