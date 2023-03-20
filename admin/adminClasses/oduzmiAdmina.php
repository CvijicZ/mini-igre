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

        $sql="DELETE FROM admin WHERE igracId=:id";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":id", $_POST['id']);
        $stmt->execute();
        $stmt->closeCursor();

        $sql="UPDATE igrac SET admin=0 WHERE id=:id";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":id", $_POST['id']);
        $stmt->execute();
        $dbh->commit();
        echo "Uspesno ste oduzeli administratorsku privilegiju za korisnika " .$_POST['id'];
          
       
        
    }

    catch(PDOException $e){
        $dbh->rollBack();
        echo $e->getMessage();
    }
}