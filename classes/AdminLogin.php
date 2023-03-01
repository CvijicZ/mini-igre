<?php
if(isset($_POST['submit'])){
    $ime=$_POST['ime'];
    $sifra=$_POST['sifra'];
    include "dbh.php";

    $sql="SELECT sifra FROM admin WHERE ime=:ime";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(":ime",$ime);
    $stmt->execute();
    if($stmt->rowCount()==0){
        header("location: AdminLogin.php?error=NepostojeceIme");
        exit();
    }
    $sif=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if($sifra!==$sif[0]['sifra']){
        header("location: AdminLogin.php?error=PogresnaLozinka");
        $stmt=null;
        exit();
    }
    $sql1="SELECT * FROM admin WHERE ime=:ime";
    $stmt=$dbh->prepare($sql1);
    $stmt->bindParam(':ime', $ime);
    $stmt->execute();
    $korisnik=$stmt->fetchAll(PDO::FETCH_ASSOC);
    session_destroy();
    session_start();
    $_SESSION['ime']=$korisnik[0]['ime'];   
    $_SESSION['adminId']=$korisnik[0]['id'];
    header("location: /mini-igre/admin/adminPanel.php");
}