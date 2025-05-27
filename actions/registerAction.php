
<?php
session_start();
require "../dbconnection.php"; 

if($_SERVER['REQUEST_METHOD']=="POST"){
    $name= trim($_POST['username']);
    $email=trim($_POST['email']);
    $password= trim($_POST['password']);
   

    if( !isset($name) || empty($name) ||  !isset($email) ||  empty($email) || !isset($password) || empty($password)) {  
           // mamno3 ykon empty wala fe spaces
           header("Location:/youbee-blog/register.php?err=1");
           exit();
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location:/youbee-blog/register.php?err=3");
        exit();
    }
    if( strlen($password) < 8 ){
        header("Location:/youbee-blog/register.php?err=4");
    exit();

 }
          


    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name,email, password)
            VALUES (:name,  :email, :password)";
    try{
    
     $stmt=$pdo->prepare($sql);
     $stmt->bindParam(':name' ,$name);
     $stmt->bindParam(':email' ,$email);
     $stmt->bindParam(':password', $hashedPassword);
     $stmt->execute();
     //echo "new cutomer added";
     $_SESSION['loggedin']= true;
     $_SESSION['id']=$pdo->lastInsertID();
     header("Location: ../index.php");

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

     


  
   
}
