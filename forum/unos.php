<?php 
include "../classes/dbh.php";
session_start();
if(isset($_POST['submit']) && isset($_SESSION['ime'])){
    
    $naslov=$_POST['naslov'];
    $sadrzaj=$_POST['sadrzaj'];

    if(empty($naslov) || empty($sadrzaj)){
        header("location: ../forum.php?error=PraznoPolje");
        exit();
    }


    $sql="INSERT INTO forum(naslov,sadrzaj,idAutora,vremeObjave) VALUES(:naslov,:sadrzaj,:idAutora,:vremeObjave)";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(":naslov",$naslov);
    $stmt->bindParam(":sadrzaj",$sadrzaj);
    $stmt->bindParam(":idAutora",$id);
    $stmt->bindParam(":vremeObjave",$vreme);
    $id=$_SESSION['id'];
    $vreme=date('Y-m-d H:i:s');
    
    if($stmt->execute()){
        header("location: sveTeme.php");
    }
    else {
        echo "neuspesno";
    }

    }
    else {
        header("location: ../forum.php?error=NistePrijavljeni");
    }
    
