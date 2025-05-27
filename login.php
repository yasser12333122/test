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
    <meta name="author" content="">

    <title>Login - YouBee Blog Template</title>

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

        <div class="col-lg-2"></div>

        <!-- Login content  -->
        <div class="col-lg-8 login">

          <!-- Title -->
          <h1>Login</h1>

          <!-- Login form -->
          <form action="actions/loginaction.php" method="POST" class="login-form">
            <div class="form-group">
              <label for="email">email</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control" required >
            </div>

            <button type="submit" class="btn btn-primary">Log in</button>
            <p>Don't have an account? <a href="signup.html">Sign Up Now</a></p>
          </form>



          <?php
     if(isset($_GET['err'])){
        if($_GET ['err']==1){
            echo "<p style='color: red'>Missing parameters</p>";

        } if($_GET['err']==2){
            echo "<p style='color: red'>NOT valid  Email</p>";
        }
        if($_GET['err']==3){
            echo "<p style='color: red'> wrong email or password</p>";
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
