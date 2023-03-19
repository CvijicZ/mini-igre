<?php 
session_start();
if(isset($_SESSION['adminId'])){
    include "../../classes/dbh.php";
    try{
        $dbh->beginTransaction();

        $sql="UPDATE igrac SET admin=1 WHERE id=:id";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":id", $_POST['id']);
        $stmt->execute();
        $stmt->closeCursor();

        $sql="SELECT * FROM igrac WHERE id=:id";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":id", $_POST['id']);
        $stmt->execute();
        $result=$stmt->fetchAll();
        $stmt->closeCursor();

        $sql="INSERT INTO admin(ime,sifra) VALUES(:ime,:sifra)";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":ime", $result[0]["ime"]);
        $stmt->bindParam(":sifra", $result[0]["sifra"]);
        if($stmt->execute()){
            echo "Korisniku je uspesno dodeljena administratorska privilegija!";
            $dbh->commit();
        }
    }


    catch(PDOException $e){
        echo $e->getMessage();
        $dbh->rollBack();
    }
    
   
}