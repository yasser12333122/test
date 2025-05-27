<?php
session_start();
include "components/checklogin.php";
require "dbconnection.php"; 
$sql="SELECT  posts.id ,posts.title ,posts.short_desc,posts.long_desc ,posts.created_at,users.name As user_name,users.id AS user_id FROM posts
 JOIN users ON users.id = posts.user_id ORDER BY created_at DESC;"; // 3mlna join 3ashen nes7ab isem mn table usesrs 
$stmt=$pdo->query($sql);
$posts= $stmt->fetchAll(PDO::FETCH_ASSOC); 
//  print_r($posts);



?>



<!DOCTYPE html>
<html lang="en">

<?php 


include "components/nav.php";

include "components/footer.php";


?>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is demo page made for YouBee.ai's programming courses">
    <meta name="author" content="">


    <title>Home - Blog Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-blog-template.css" rel="stylesheet">


  </head>

  <body>
    <?php 
echo $_SESSION['id'];
    ?>

    <!-- Navigation -->
    




      <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

          <!-- First Blog Post -->
          <?php
          foreach($posts as $post ){
$date= new DateTime($post['created_at']);
$formateddate= $date->format('F j,Y \a\t g:i A');


            echo '
          <h2 class="post-title">
           <a href="post.php?id=' . $post['id'] .' ">'. $post['title'] . '</a>
          </h2>
          <a href="author.php?id=' . $post['user_id'] .' " class="lead">
          ' . $post['user_name'] . '
          </a>
          <p><span class="glyphicon glyphicon-time"></span> Posted on ' . $formateddate .  ' </p>
          <p>'. $post['short_desc'] . '</p>
            <p>'. $post['long_desc'] . '</p>
          <a class="btn btn-default" href="post.php?id=' . $post['id'] .' ">Read More</a>
          <a class="btn btn-default" href="post.php?id=' . $post['id'] .' ">Read Later</a>

          <hr>';
}

        

        ?>

          <!-- Pager -->
          <ul class="pager">
            <li class="previous">
              <a href="#">Prev</a>
            </li>
            <li class="next">
              <a href="#">Next</a>
            </li>
          </ul>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php 


include "components/footer.php";


?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>

</html>
