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


    $sql="INSERT INTO forum(naslov,sadrzaj) VALUES(:naslov,:sadrzaj)";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(":naslov",$naslov);
    $stmt->bindParam(":sadrzaj",$sadrzaj);
    if($stmt->execute()){
        echo "Uspesno uneto";
    }
    else {
        echo "neuspesno";
    }

    }
    else {
        header("location: ../forum.php?error=NistePrijavljeni");
    }
    
