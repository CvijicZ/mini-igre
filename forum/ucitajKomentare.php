<?php
session_start();
$idObjave=$_GET['idObjave'];
global $idAutora;
include "../classes/dbh.php";
$sql="SELECT * FROM komentar WHERE idObjave=:idObjave ORDER BY vremeKomentara DESC";
$stmt=$dbh->prepare($sql);
$stmt->bindParam("idObjave", $idObjave);
$stmt->execute();

foreach($stmt as $row){
    $idAutora=$row['idAutora'];
    echo "<div class='bg-light p-2' id='stariKomentar'>" . 
         "<div class='d-flex flex-row align-items-start'>" . 
         dajAvatar() . 
         "<div class='form-control ml-1 shadow-none textarea'>" . $row['sadrzajKomentara'] . "</div></div>" . 
         "<div class='d-flex flex-column justify-content-start ml-2 cnt'>" . 
         "<span class='date text-black-50'>" . $row['vremeKomentara'] . "</span>" . 
         "<span class='date text-text-black-50'>" . "Korisnik: " . dajIme() . "</span>" . "</div></div>";
}
function dajAvatar(){
    global $idAutora;
    include "../classes/dbh.php";
    $sql="SELECT avatarId FROM igrac WHERE id=:id";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(":id", $idAutora);

    $stmt->execute();
    $idAvatar=$stmt->fetchColumn();
    $stmt->closeCursor();
    $sql="SELECT avatar FROM avatar WHERE id=:id";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(":id", $idAvatar);
    $stmt->execute();
    $avatar=$stmt->fetchColumn();
    return '<img class="rounded-circle" width="40" height="40" src="data:image;base64,' .base64_encode ($avatar) . '" > '; 
}
function dajIme(){
    global $idAutora;
    include "../classes/dbh.php";
    $sql="SELECT ime FROM igrac WHERE id=:id";
    $stmt=$dbh->prepare($sql);
    $stmt->bindParam(":id", $idAutora);
    $stmt->execute();
    $ime=$stmt->fetchColumn();
    return $ime;
}