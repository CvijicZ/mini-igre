<?php 
$hostname="localhost";
$dbname="miniigre";
$username="root";
$password="";
try{
    $dbh=new PDO("mysql:host=$hostname;dbname=$dbname;charset=utf8", $username, $password);
}
catch(PDOException $e){
    echo $e->getMessage();
}
