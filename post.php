<!DOCTYPE html>
<?php 
session_start();

include "components/nav.php";
require "dbconnection.php"; 
include "components/checklogin.php";
$postid=$_GET['id'];

$sql="SELECT  posts.id ,posts.title ,posts.short_desc,posts.long_desc ,posts.created_at,users.name ,users.id AS user_id FROM posts
 JOIN users ON users.id = posts.user_id WHERE  posts.id=:id";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':id' ,$postid );
 $stmt->execute();
 $post= $stmt->fetch(PDO::FETCH_ASSOC); 
//  print_r($post);

;
$date= new DateTime($post['created_at']);
$formateddate= $date->format('F j,Y \a\t g:i A');

?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is demo page made for YouBee.ai's programming courses">
    <meta name="author" content="">

    <title>Post - YouBee Blog Template</title>

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

        <!-- Blog Post Content Column -->
        <div class="col-lg-12">

          <!-- Blog Post -->

          <!-- Title -->
           

          <h1 class="post-title"><?php echo $post['title'] ?></h1>

          <!-- Author -->
          <a href="author.php?id=' . $post['user_id'] .' " class="lead">
           <?php echo $post['name'] ?>

        
          </a>
          </a>

          <hr>

          <!-- Date/Time -->
          <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $formateddate ?></p>

          <hr>

          <!-- Post Content -->
          <p> <?php echo $post['long_desc'] ?></p>
        

          <hr>

          <!-- Blog Comments -->

          <!-- Comments Form -->
          <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form">
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>

          <hr>

          <!-- Posted Comments -->

          <!-- Comment -->
          <div class="media">
            <a class="pull-left" href="#">
              <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
              <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2024 at 9:30 PM</small>
              </h4>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

          <!-- Comment -->
          <div class="media">
            <a class="pull-left" href="#">
              <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
              <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2024 at 9:30 PM</small>
              </h4>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              <!-- Nested Comment -->
              <div class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                  <h4 class="media-heading">Nested Start Bootstrap
                    <small>August 25, 2024 at 9:30 PM</small>
                  </h4>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>
              <!-- End Nested Comment -->
            </div>
          </div>

        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
   <?php

include "components/footer.php"
?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
  </body>

</html>
