<?php 
session_start();
if(isset($_SESSION['adminId'])){
    if($_POST['id']==$_SESSION['adminId']){
        echo "Ne mozete sami sebi ukinuti administratorske privilegije!";
       exit();
    }
    include "../../classes/dbh.php";
    try{
        $dbh->beginTransaction();
        $sql="DELETE FROM admin WHERE id=:id";
        
    }

    catch(PDOException $e){
        echo $e->getMessage();
    }
}