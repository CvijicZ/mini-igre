<?php
session_start();
if(isset($_POST['a'])){

    $noviIdAvatara=$_POST['a'];
    include "dbh.php";
    $sql="UPDATE igrac  SET avatarId=:avatarId WHERE id=:id";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(":avatarId", $noviIdAvatara);
    $stmt->bindParam(":id", $_SESSION['id']);
    if($stmt->execute()){
        header("location: /mini-igre/izmenaNaloga.php?error=none");
        exit();
    }
    else {
        header("location: /mini-igre/izmenaNaloga.php?error=neocekivanaGreska");
        exit();
    }

}