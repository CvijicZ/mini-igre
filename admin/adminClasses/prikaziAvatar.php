<?php

include "../../classes/dbh.php";


$sql="SELECT * FROM avatar";
$stmt=$dbh->prepare($sql);
$stmt->execute();
foreach($stmt as $row){
    echo '<img src="data:image;base64,' .base64_encode ($row['avatar']) . '" alt="img" width="100px" height="100px"> ';
}



