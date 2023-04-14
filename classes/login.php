<?php
if(isset($_POST['submit'])){
    include "dbh.php";
    $ime=$_POST['ime'];
    $sifra=$_POST['sifra'];
    $sql="SELECT sifra FROM igrac WHERE ime=:ime || email=:ime";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(':ime', $ime);
    $stmt->execute();
    if($stmt->rowCount()==0){
        header("location: ../prijava.php?error=KorisnikNijePronadjen");
        exit();
    }
    $sif=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if(!password_verify($sifra, $sif[0]['sifra'])){
        header("location: ../prijava.php?error=PogresnaSifra");
        $stmt=null;
        exit();
    }
    $sql1="SELECT * FROM igrac WHERE ime=:ime";
    $stmt=$dbh->prepare($sql1);
    $stmt->bindParam(':ime', $ime);
    $stmt->execute();
    $korisnik=$stmt->fetchAll(PDO::FETCH_ASSOC);
    session_start();
    $_SESSION['ime']=$korisnik[0]['ime'];
    $_SESSION['mejl']=$korisnik[0]['mejl'];
    $_SESSION['id']=$korisnik[0]['id'];
    $_SESSION['admin']=$korisnik[0]['admin'];
    
    header("location: ../index.php");
}
