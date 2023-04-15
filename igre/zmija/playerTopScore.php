<?php
session_start();
include "../../classes/dbh.php";
$sql="SELECT rezultat FROM rezultatiZmija WHERE idIgraca=:idIgraca";
$stmt=$dbh->prepare($sql);
$stmt->bindParam(":idIgraca", $_SESSION['id']);
$stmt->execute();
$result=$stmt->fetchColumn();
echo $result;