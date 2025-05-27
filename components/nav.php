
<?php
session_start();
$loggedIn=false;
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedIn=true;
   
} 
?>


<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"> Blog System</a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">

            <li>
              <a href="about.php">About</a>
            </li>
            <?php
            if($loggedIn==false){

           echo '

            <li>
              <a href="login.php">Login</a>
            </li>
            <li>
              <a href="register.php">Sign up</a>
            </li> ' ;
            }
            else { // // 3ashen n7na ba3tna user id bel author page  
             echo '

            
             <li>
                <a href="login.php">Saved posts</a>
              </li>
              <li>
                <a href="author.php?id='. $_SESSION['id'] .'"> Profile</a>    
              </li> 
               <li>
                <a href="logout.php"> log out</a>
              </li> ';
            }
              ?>
            
          </ul>


         
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>