<?php
session_start();
require "../dbconnection.php"; 


if($_SERVER['REQUEST_METHOD']=="POST"){
    $email= trim($_POST['email']);
    $password= trim($_POST['password']);

if(!isset($email) || empty($email) || !isset($password) || empty($password)){
    header("Location:/youbee-blog/login.php?err=1");
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location:/youbee-blog/login.php?err=2");
    exit();
}


}

$sql= "SELECT id, password FROM users where email=:email";
try{
$stmt=$pdo-> prepare($sql);
$stmt->bindParam(':email',$email); // prevent sql injection 
$stmt->execute();
$user= $stmt->fetch(PDO::FETCH_ASSOC);  // tal3na email w pass w id 


if( password_verify ( $password,$user['password'] )) { //iza mtl ba3ed 
    $_SESSION['loggedin']= true;
    $_SESSION['id']=$user['id'];
    header("Location:/youbee-blog/index.php");
    exit();


}
else{
    header("Location:/youbee-blog/login.php?err=3");
    exit();
} 
}
catch (PDOException $ex) {
   echo $ex-> getMessage();
    exit();
}






?>