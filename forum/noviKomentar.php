<?php
session_start();
$sadrzaj=$_GET['comment'];
$idObjave=$_GET['idObjave'];
if(empty($sadrzaj) || strlen($sadrzaj)>1000 || !isset($_SESSION['id'])){
    echo "Nice job, you successfully bypassed my javascript :)";
    exit();
}
include "../classes/dbh.php";
$sql="INSERT INTO komentar(idAutora,sadrzajKomentara,vremeKomentara,idObjave) VALUES(:idAutora,:sadrzaj,:vreme,:idObjave)";
$stmt=$dbh->prepare($sql);
$stmt->bindParam(":idAutora", $_SESSION['id']);
$stmt->bindParam(":sadrzaj", $sadrzaj);
$stmt->bindParam(":vreme", $vreme);
$stmt->bindParam(":idObjave", $idObjave);
$vreme=date('Y-m-d H:i:s');
$stmt->execute();


echo $_GET['comment'];
echo $_GET['idObjave'];