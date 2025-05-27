
<?php
session_start();
require "../dbconnection.php"; 

if($_SERVER['REQUEST_METHOD']=="POST"){
    $title= trim($_POST['title']);
    $shortdesc=trim($_POST['shortdesc']);
    $longdesc= trim($_POST['longdesc']);
   

    if( !isset($title) || empty($title) ||  !isset($shortdesc) ||  empty($shortdesc) || !isset($longdesc) || empty($longdesc)) {  
           // mamno3 ykon empty wala fe spaces
           header("Location:/youbee-blog/newpost.php?err=1");
           exit();
    }
   
    }
   


   

    $sql = "INSERT INTO posts (title,short_desc, long_desc,user_id )
            VALUES (:title,  :shortdesc, :longdesc,:userid )";
    try{
    
     $stmt=$pdo->prepare($sql);
     $stmt->bindParam(':title' ,$title);
     $stmt->bindParam(':shortdesc' , $shortdesc);
     $stmt->bindParam(':longdesc',  $longdesc);
     $stmt->bindParam(':userid',  $_SESSION['id']);
     $stmt->execute();

     echo "Session ID: " . $_SESSION['id'];

    }
 catch (PDOException $ex) {
        if($ex->getCode()==23000){
            header("Location:/youbee-blog/register.php?err=2");
            exit();
        exit();
        } else{
            echo $ex->getMessage();
        }
    

    }

     


  
   

