<?php 
session_start();

if(isset($_GET) || isset($_SESSION['id'])){
    include "../../classes/dbh.php";
    $sql="SELECT MAX(rezultat) FROM rezultatiZmija WHERE idIgraca=:idIgraca";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(":idIgraca", $_SESSION['id']);
    $stmt->execute();
    $topScore=$stmt->fetchColumn();
    $stmt->closeCursor();

    if($topScore===null){
        $sql="INSERT INTO rezultatiZmija(idIgraca,rezultat,imeIgraca) VALUES(:idIgraca,:rezultat,:imeIgraca)";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":idIgraca", $_SESSION['id']);
        $stmt->bindParam(":rezultat", $_GET['score']); 
        $stmt->bindParam(":imeIgraca", $_SESSION['ime']);
        $stmt->execute();
        echo "Vas prvi rezultat je uspesno unesen!";
    }

    else if($topScore < $_GET['score']){
        $sql="UPDATE rezultatiZmija SET rezultat=:rezultat WHERE idIgraca=:idIgraca";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":idIgraca", $_SESSION['id']);
        $stmt->bindParam(":rezultat", $_GET['score']); 
        $stmt->execute();
        echo "Cestitam, oborili ste sopstveni skor!";
    }
    else {echo "Nazalost, niste oborili sopstveni skor.";}
}
