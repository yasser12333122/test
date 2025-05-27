<?php 
session_start();
require "dbconnection.php"; 
include "components/checklogin.php";
$userid=$_GET['id'];

$sql="SELECT name from users where id =:id";
$stmt=$pdo->prepare($sql);
 $stmt->bindParam(':id' ,$userid );
 $stmt->execute();
 $postname= $stmt->fetch(PDO::FETCH_ASSOC); 
 $username=$postname['name'];
// print($username);


$sql="SELECT  posts.id ,posts.title ,posts.short_desc,posts.long_desc ,posts.created_at,users.name ,users.id AS user_id FROM posts
 JOIN users ON users.id = posts.user_id WHERE  users.id=:id";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':id' ,$userid );
 $stmt->execute();
 $posts= $stmt->fetchAll(PDO::FETCH_ASSOC); 

$isprofileowner=$userid==$_SESSION['id'];


?>
<!DOCTYPE html>
<html lang="en">
<?php 


include "components/nav.php";

?>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is demo page made for YouBee.ai's programming courses">
    <meta name="author" content="">

    <title>Home - YouBee Blog Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-blog-template.css" rel="stylesheet">


  </head>

  <body>

  
    <!-- Page Content -->
    <div class="container">

      <div class="row">
         <!-- Page Title -->
        <div class="col-md-12">
          <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
          </a>
          <h2>Posts by <?php echo $username; ?>: <?php echo count($posts); ?> posts</h2>
          <?php 
          if($isprofileowner){
            
         echo' <a href="updateprofile.php"> update profile </a>';
          }
          ?>

        </div>
        <!-- Blog Entries Column -->
        <div class="col-md-12">

          <!-- First Blog Post -->
       
            <?php 
            foreach ($posts as $post) {
              echo '
                 <h2 class="post-title">
            <a href="post.html"> ' . $post['title'] . '</a>
          </h2>
          <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
          <p>' . $post['long_desc'] . '</p>
          <a class="btn btn-default" href="post.html">Read More</a>

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
   
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>




  </body>

</html>
