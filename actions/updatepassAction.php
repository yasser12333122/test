<?php
session_start();
require "../dbconnection.php"; 

if($_SERVER['REQUEST_METHOD']=="POST"){
    $oldpass= trim($_POST['oldpass']);
    $newpass= trim($_POST['newpass']);

if(!isset($oldpass) || empty($oldpass) ||!isset($newpass) || empty($newpass)){
    header("Location:/youbee-blog/changepass.php?err=1");
}
}
$sql="SELECT password FROM users where id=:id ";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$_SESSION['id']);
$stmt->execute();
$user= $stmt->fetch(PDO::FETCH_ASSOC); 
$oldpassdb=$user['password'];


if(!password_verify($oldpass,$oldpassdb)){
    header("Location:/youbee-blog/changepass.php?err=2");
} 
$hashedpass = password_hash($newpass, PASSWORD_BCRYPT);

try{
$sql = "UPDATE  users SET password=:pass WHERE   id=:id";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(':pass',$hashedpass);
$stmt->bindParam(':id',$_SESSION['id']);
$stmt->execute();
header("Location:/youbee-blog/index.php");
exit();
} catch (PDOException $ex) {
  " erro" . $ex->getMessage();
}






?>