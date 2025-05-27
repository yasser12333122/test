<?php
session_start();
require "../dbconnection.php"; 

if($_SERVER['REQUEST_METHOD']=="POST"){
    $email= trim($_POST['email']);
    $username= trim($_POST['username']);
    $password= trim($_POST['password']);

if(!isset($email) || empty($email) ||!isset($username) || empty($username)|| !isset($password) || empty($password)){
    header("Location:/youbee-blog/updateInfo.php?err=1");
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location:/youbee-blog/updateInfo.php?err=3");
    exit();
}


} 

$sql= "SELECT password FROM users where id=:id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$_SESSION['id']);
$stmt->execute();
$user= $stmt->fetch(PDO::FETCH_ASSOC); 
$oldpass=$user['password'];

if(!password_verify($password, $oldpass)){
    // If password does not match, show error
    header("Location:/youbee-blog/updateInfo.php?err=2");
    exit();
}


$sql = "UPDATE   users  SET email=:email , name=:name WHERE id=:id";
    try{
    
     $stmt=$pdo->prepare($sql);
     $stmt->bindParam(':name' ,$username);
     $stmt->bindParam(':email' ,$email);
     $stmt->bindParam(':id' ,$_SESSION['id']);
     $stmt->execute();
     header("Location: ../index.php");
     exit();

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



?>