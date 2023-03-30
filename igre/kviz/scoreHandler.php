<?php 
session_start();

if(isset($_GET) || isset($_SESSION['id'])){
    include "../../classes/dbh.php";
    $sql="SELECT MAX(rezultat) FROM rezultatiKviz WHERE idIgraca=:idIgraca";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(":idIgraca", $_SESSION['id']);
    $stmt->execute();
    $topScore=$stmt->fetchColumn();
    $stmt->closeCursor();

    if($topScore < $_GET['score']){
        $sql="INSERT INTO rezultatiKviz(idIgraca,rezultat,imeIgraca) VALUE(:idIgraca,:rezultat,:imeIgraca)";
        $stmt=$dbh->prepare($sql);
        $stmt->bindParam(":idIgraca", $_SESSION['id']);
        $stmt->bindParam(":rezultat", $_GET['score']); 
        $stmt->bindParam(":imeIgraca", $_SESSION['ime']);
        $stmt->execute();
        echo "Cestitam, oborili ste sopstveni skor!";
    }
    else {echo "Nazalost, niste oborili sopstveni skor.";}
}

