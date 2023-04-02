<?php

function getUserInfo(){
    include "../classes/dbh.php";
    $sql="SELECT * FROM forum WHERE idObjave=:id";
$stmt=$dbh->prepare($sql);
$stmt->bindParam(":id", $_GET['id']);
$stmt->execute();
$result=$stmt->fetch(PDO::FETCH_ASSOC);
$stmt->closeCursor();

$sql="SELECT * FROM igrac WHERE id=:id";
$stmt=$dbh->prepare($sql);
$stmt->bindParam(":id", $result['idAutora']);
global $idAutora;
$idAutora=$result['idAutora'];
$stmt->execute();
$igracInfo=$stmt->fetch(PDO::FETCH_ASSOC);
$stmt->closeCursor();

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
    return '<img class="rounded-circle" width="60" height="60" src="data:image;base64,' .base64_encode ($avatar) . '" > '; 
}


echo   dajAvatar() . "<div class='d-flex flex-column justify-content-start ml-2 cnt'>" .
 "<span class='d-block name'>" .$result['naslov'] . "</span>" . "<span class='date text-black-50'>" .$result['vremeObjave'] . "</span>" . 
 "<span class='date text-black-50'>Korisnik: " .$igracInfo['ime'] . "</span>" . "</div></div>" . "<div class='mt-2'>" . "<p class='comment-text'>".$result['sadrzaj'] ."</p></div>";

}









// USER INFO
// <div class="d-flex flex-row user-info">

//           <img src="../img/kviz.webp" alt="" width="60" height="60" class="rounded-circle">
//           <div class="d-flex flex-column justify-content-start ml-2 cnt">
//             <span class="d-block name">Zoran CvijicZoran CvijicZoran CvijicZoran CvijicZoran CvijicZoran Cvijic</span>
//             <span class="date text-black-50">13.04.2023 13:52</span>
//             <span class="date text-black-50">Korisnik: Zoran</span>
            
//           </div>

//         </div>
//         <div class="mt-2">
//           <p class="comment-text">Woww! This really workWoww! This really worksWoww! This really worksWoww! This really worksWoww! This really workss</p>
//         </div>






// echo "<div class='prikazTeme'>" .
//  "<div class='naslov'>". $result['naslov'] . "</div>" . 
//  $result['sadrzaj'] . 
//  $result['vremeObjave'] . 
//  "</div>"; 
 
