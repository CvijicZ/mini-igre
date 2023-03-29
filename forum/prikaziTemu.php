<?php
include "../classes/dbh.php";
$sql="SELECT * FROM forum WHERE idObjave=:id";
$stmt=$dbh->prepare($sql);
$stmt->bindParam(":id", $_GET['id']);
$stmt->execute();
$result=$stmt->fetch(PDO::FETCH_ASSOC);

echo $result['idAutora'] . '|' . $result['idObjave'] . '||' . $result['naslov'] . '|' . $result['sadrzaj'] . $result['vremeObjave'] . "<br>";
echo "yeah" . "<br>";
echo $_GET['id'];