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


    $sql="INSERT INTO forum(naslov,sadrzaj,id) VALUES(:naslov,:sadrzaj,:id)";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(":naslov",$naslov);
    $stmt->bindParam(":sadrzaj",$sadrzaj);
    $stmt->bindParam(":id",$id);
    $id=$_SESSION['id'];
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
    
