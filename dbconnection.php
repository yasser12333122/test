<?php

$server="localhost";
$username="root";
$password="";
$db="youbeeblog";

try{
    $pdo= new PDO("mysql:host=$server;dbname=$db",$username,$password);

} catch( PDOException $ex){
    echo"connection to database failed error:" . $ex-> getMessage();
    die();

}