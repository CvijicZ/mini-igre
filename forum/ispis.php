<?php

include "../classes/dbh.php";
$sql="SELECT * FROM forum";
$stmt=$dbh->prepare($sql);
$stmt->execute();
foreach($stmt as $row){
    echo "Naslov: " . "<h1>" . $row['naslov'] ."</h1>" . "Sadrzaj: " . $row['sadrzaj'] . '<br>';
}